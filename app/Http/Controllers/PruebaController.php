<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\User;
use App\Models\Product;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Imports\ProductsImport;
use App\Exports\ProductsExport;

use DB;

class ExcelController extends Controller
{
    /**
     * Gestiona formulario para exportación e importación de archivos
     * @return Illuminate\Http\RedirectResponse
     */
    public function fileImportExport(Request $request)
    {
        //mostrar formulario
        if(empty($request->only('export_button', 'import_button'))){
            return view(config('app.admin_pages').'file-import-export');
        }
        //exigir nombre de tabla de base de datos

        if(is_null($request->only('dbTableName')['dbTableName'])){
            dd("vacio dbTableName");
            return;
        }

        //importar archivo
        if(!empty($request->only('import_button'))){
            $this->fileImport($request);
            return back();
        }

        //exportar archivo
        if(!empty($request->only('export_button'))){
            if(is_null($request->only('exportFileName')['exportFileName'])){
                dd("vacio exportFileName");
                return;
            }

            $dbTable=$this->fileExport($request);
            if(is_null($dbTable)){
                dd("objeto dbTable nulo");
                return;
            }

            $exportFileName=$request->only('exportFileName')['exportFileName'].".xlsx";
            return Excel::download($dbTable, $exportFileName);
        }

        return back();
    }

    /**
     * Importa de Excel hacia tabla de la base de datos.
     *
     * @return view
     */
    public function fileImport(Request $request)
    {
        if(empty($request->only('importFileName'))){
            dd("vacio importFileName");
            return;
        }

        $overwriteTable=$request->only('overwriteTable');
        $dbTableName=$request->only('dbTableName')['dbTableName'];
        switch ($dbTableName) {
            case 'Usuarios':
                if(!empty($overwriteTable)){
                    DB::table('Users')->truncate();
                    return Excel::import(new UsersImport, request()->file('importFileName'));
                };

                $data = Excel::toArray(new UsersImport, request()->file('importFileName'));
                $data=$data[0];
                if($data){
                    foreach($data as $val) {
                        DB::table('Users')
                            ->updateOrInsert(['id' => $val['id']], $val);
                    }
                }else{
                    dd("No se importó archivo Excel");
                    return;
                }
                break;
            case 'Productos':
                if(!empty($overwriteTable)){
                    DB::table('Products')->truncate();
                    return Excel::import(new ProductsImport, request()->file('importFileName'));
                };

                $data = Excel::toArray(new ProductsImport, request()->file('importFileName'));
                $data=$data[0];
                if($data){
                    foreach($data as $val) {
                        DB::table('products')
                            ->updateOrInsert(['id' => $val['id']], $val);
                    }
                }else{
                    dd("No se importó archivo Excel");
                    return;
                }
                break;
        }
        return;
    }

    /**
     * Exporta a Excel tabla de la base de datos.
     *
     * @return view
     */
    public function fileExport(Request $request)
    {
        $dbTableName=$request->only('dbTableName')['dbTableName'];
        switch ($dbTableName) {
            case 'Usuarios':
                return new UsersExport();
                break;
            case 'Productos':
                return new ProductsExport();
                break;
        }
        return;
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\User;
use App\Models\Product;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Imports\ProductsImport;
use App\Exports\ProductsExport;

use DB;

class ExcelController extends Controller
{
    /**
     * Gestiona formulario para exportación e importación de archivos
     * @return Illuminate\Http\RedirectResponse
     */
    public function fileImportExport(Request $request)
    {
        //mostrar formulario
        if(empty($request->only('export_button', 'import_button'))){
            return view(config('app.admin_pages').'file-import-export');
        }
        //exigir nombre de tabla de base de datos

        if(is_null($request->only('dbTableName')['dbTableName'])){
            dd("vacio dbTableName");
            return;
        }

        //importar archivo
        if(!empty($request->only('import_button'))){
            $this->fileImport($request);
            return back();
        }

        //exportar archivo
        if(!empty($request->only('export_button'))){
            if(is_null($request->only('exportFileName')['exportFileName'])){
                dd("vacio exportFileName");
                return;
            }

            $dbTable=$this->fileExport($request);
            if(is_null($dbTable)){
                dd("objeto dbTable nulo");
                return;
            }

            $exportFileName=$request->only('exportFileName')['exportFileName'].".xlsx";
            return Excel::download($dbTable, $exportFileName);
        }

        return back();
    }

    /**
     * Importa de Excel hacia tabla de la base de datos.
     *
     * @return view
     */
    public function fileImport(Request $request)
    {
        if(empty($request->only('importFileName'))){
            dd("vacio importFileName");
            return;
        }

        $overwriteTable=$request->only('overwriteTable');
        $dbTableName=$request->only('dbTableName')['dbTableName'];
        switch ($dbTableName) {
            case 'Usuarios':
                if(!empty($overwriteTable)){
                    DB::table('Users')->truncate();
                    return Excel::import(new UsersImport, request()->file('importFileName'));
                };

                $data = Excel::toArray(new UsersImport, request()->file('importFileName'));
                $data=$data[0];
                if($data){
                    foreach($data as $val) {
                        DB::table('Users')
                            ->updateOrInsert(['id' => $val['id']], $val);
                    }
                }else{
                    dd("No se importó archivo Excel");
                    return;
                }
                break;
            case 'Productos':
                if(!empty($overwriteTable)){
                    DB::table('Products')->truncate();
                    return Excel::import(new ProductsImport, request()->file('importFileName'));
                };

                $data = Excel::toArray(new ProductsImport, request()->file('importFileName'));
                $data=$data[0];
                if($data){
                    foreach($data as $val) {
                        DB::table('products')
                            ->updateOrInsert(['id' => $val['id']], $val);
                    }
                }else{
                    dd("No se importó archivo Excel");
                    return;
                }
                break;
        }
        return;
    }

    /**
     * Exporta a Excel tabla de la base de datos.
     *
     * @return view
     */
    public function fileExport(Request $request)
    {
        $dbTableName=$request->only('dbTableName')['dbTableName'];
        switch ($dbTableName) {
            case 'Usuarios':
                return new UsersExport();
                break;
            case 'Productos':
                return new ProductsExport();
                break;
        }
        return;
    }
}
