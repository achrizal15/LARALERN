<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use App\Models\SparePartProduction;
use Illuminate\Http\Request;

class SparePartProductionController extends Controller
{
    public function index(SparePart $sparepart)
    {
        $sp_production = SparePartProduction::orderBy("serial_number", "DESC")
            ->where("spare_part_id", $sparepart->id)
            ->paginate(5)
            ->withQueryString();
        return view("sparepart_production_view", ["sp_productions" => $sp_production, "title" => $sparepart->serial_number . " $sparepart->name"]);
    }
    public function destroy(SparePartProduction $sparepartproduction)
    {
        $sparepartproduction->delete();
        return redirect()->back()->with("message", "Deleted successfully");
    }
}
