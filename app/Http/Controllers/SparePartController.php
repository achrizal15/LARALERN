<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateSparePart;
use App\Models\SparePart;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
class SparePartController extends Controller
{
    use UserLogTrait;
    public function index()
    {
        $sparepart = SparePart::latest()
        ->withCount("sparePartProductionTotal")
        ->paginate(10)
        ->withQueryString();
        return view("sparepart_view", ["spareparts" => $sparepart]);
    }
    public function create()
    {
        return view("sparepart_form", ["action" => "Add", "route" => route("sparepart_store")]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "weight" => "numeric|required",
            "dimension" => "required"
        ]);
        SparePart::create($data);
        return redirect(route("sparepart"))->with("message", "Created successfully");
    }
    public function edit(SparePart $sparepart)
    {
        return view("sparepart_form", ["action" => "Edit", "sparepart" => $sparepart, "route" => route("sparepart_update", $sparepart->id)]);
    }

    public function update(Request $request, SparePart $sparepart)
    {
        $data = $request->validate([
            "name" => "required",
            "weight" => "numeric|required",
            "dimension" => "required"
        ]);
        $sparepart->update($data);
        return redirect(route("sparepart"))->with("message", "Updated successfully");
    }

    public function destroy(SparePart $sparepart)
    {
        $sparepart->delete();
        return redirect(route("sparepart"))->with("message", "Deleted successfully");
    }
    public function generate(Request $request, SparePart $sparepart)
    {
        $data = $request->validate(["total" => "required|numeric"]);
        dispatch(new GenerateSparePart(["parent" => $sparepart->id, "loop" => $data["total"]]));
        $this->store_user_log("Generating sparepart $sparepart->serial_number with $request->total rows.","Create");
        return redirect(route("sparepart"))->with("message", "Generate will be processing");
    }
}
