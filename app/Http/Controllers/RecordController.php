<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RecordController extends Controller
{
    public function apiIndex(): JsonResponse
    {
        $builder = Record::query();
        return DataTables::of($builder)->make();
    }

    public function apiRecord(Request $request): JsonResponse
    {
        $builder = Record::query()
            ->where('id', $request['id']);
        return DataTables::of($builder)->make();
    }
////    public function apiView(Request $request): View|Factory|Application
////    {
////        $user = Record::query()->find($request['id']);
////        //return DataTables::of($builder)->make();
////        return \view('users.view', [
////            'user' => $user
////        ]);
//
//    }
    public function recordCreation(Request $request): Factory|View|Application|RedirectResponse
    {
        if($request->isMethod('post')){
            $data = $request->validate([
                'name' => 'required|min:2|max:100',
                'phone' => 'required|min:7|max:11',
                'address' => 'required|min:2|max:250',
                'title' => 'required|min:3|max:100',
                'case-desc' => 'required|min:10|max:1000',
            ]);

            $record = Record::query()->create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'title' => $data['title'],
                'case-desc' => $data['case-desc'],
            ]);

            return redirect()->route('users.view' , $record['id']);
        }

        return \view('users.add');
    }
    public function view(Request $request): View|Factory|Application
    {
        $record = Record::query()->find($request['id']);

        return \view('users.view', [
            'record' => $record
        ]);
    }

    public function index()
    {
        return view('users.index');
    }

    public function update(Request $request): Factory|View|Application|RedirectResponse
    {
        $record = Record::query()->find($request['id']);

        if(empty($record)){
            return view('users.index');
        }

        if($request->isMethod('post')){
            $data = $request->validate([
                'name' => 'required|min:2|max:100',
                'phone' => 'required|min:7|max:11',
                'address' => 'required|min:12|max:200',
            ]);

            if($record['phone'] != $data['phone']){
                $userWithPhone = Record::query()
                    ->select('id')
                    ->where('phone', $data['phone'])
                    ->exists();

                if ($userWithPhone) {
                    return redirect()
                        ->back()
                        ->withInput($request->post());
                }
            }
            $record->update($data);
            return redirect()->route('users.view' , $record['id']);

        }
        return \view('users.edit', compact('record'));
        }

    public function delete($id): RedirectResponse
    {
        $record = Record::find($id);
        $record->delete($id);
        return redirect()->route('records');
    }
}
