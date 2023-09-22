<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSaveRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param UserService $userService
     */
    public function __construct(
        protected UserService $userService
    )
    {
    }

    /**
     * @param UserSaveRequest $request
     * @return JsonResponse|null
     */
    public function createOrUpdate(UserSaveRequest $request): ?JsonResponse
    {
        try {
            if ($request['user_id'] !== null) {
                $user = $this->userService->update($this->formatData($request), $request['user_id']);
            } else {
                $user = $this->userService->create($this->formatData($request));
            }

            $user->interests()->sync($request['interests']);

            return response()->json([
                'status' => 200,
                'message' => 'User Saved Successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 422,
                'message' => 'Something Went Wrong! Please Try again later'
            ]);
        }
    }

    /**
     * @param Request $request
     * @return null
     * @throws Exception
     */
    public function userList(Request $request)
    {
        if ($request->ajax()) {
            $userList = $this->userService->userList(with: ['interests']);

            return Datatables::of($userList)
                ->addIndexColumn()
                ->addColumn('action', function ($userList) {
                    return '
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item reset_form" href="#" onclick="findUser(\'/user/find/' . $userList->id . '\')">
                                    <i class="dw dw-edit2"></i> Edit
                                </a>
                                <a class="dropdown-item mb-xl-3" href="#" onclick="deleteUser(\'/user/delete/' . $userList->id . '\')">
                                    <i class="dw dw-delete-3" style="cursor: pointer;"> Delete</i>
                                </a>
                            </div>
                        </div>
                    ';
                })
                ->editColumn('interest', function ($userList) {
                    if ($userList->interests) {
                        $interestBadges = '';

                        foreach ($userList->interests as $interest) {
                            $interestBadges .= '<span class="badge badge-success">' . $interest->interest . '</span>&nbsp;';
                        }

                        return $interestBadges;
                    }
                })
                ->rawColumns(['action', 'interest'])
                ->make(true);
        }
    }

    /**
     * @param int $id
     * @return Builder|Builder[]|Collection|Model|mixed|null
     */
    public function find(int $id): mixed
    {
        return $this->userService->find($id, ['interests']);
    }

    /**
     * @param int $id
     * @return JsonResponse|void
     */
    public function delete(int $id)
    {
        $user = $this->userService->findOneOrFail($id);

        try {
            if ($user) {
                $user->interests()->detach();
                $user->delete();

                return response()->json([
                    'status' => 200,
                    'message' => 'User Deleted Successfully'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 422,
                'message' => 'Something Went Wrong! Please Try again later'
            ]);
        }
    }

    /**
     * @param $data
     * @return array
     */
    public function formatData($data): array
    {
        return [
            'name' => $data['name'],
            'surname' => $data['surname'],
            'id_number' => $data['id_number'],
            'email' => $data['email'],
            'dob' => $this->userService->dateFormat($data['dob']),
            'phone_no' => $data['phone_no'],
            'language' => $data['language'],
        ];
    }
}
