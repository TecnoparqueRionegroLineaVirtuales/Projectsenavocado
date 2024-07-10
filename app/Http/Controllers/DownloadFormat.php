<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;

class DownloadFormat extends Controller
{
    public function downcurriculum($id)
    {
        $format = Format::select('url')->find($id);

        $pathToCurriculum = $format->url;
        return response()->download($pathToCurriculum);

        /*if (empty($curriculum) || is_null($curriculum)) {
            Flash::error(__('Document not found'));
            return redirect(route('backend.driver.index'));
        }*/
    }
}
