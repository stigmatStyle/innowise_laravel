<?php

    namespace App\Http\Controllers;

    use App\Models\Item;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    class ItemController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return Item::orderBy('created_at', 'DESC')->get();
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         *
         * @return Item
         */
        public function store(Request $request)
        {
            $newItem       = new Item;
            $newItem->name = $request->item['name'];
            $newItem->save();

            return $newItem;
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         *
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         *
         * @return \Illuminate\Http\Response
         */
        public function edit(Request $request, int $id)
        {
            $existingItem = Item::find($id);
            if ($existingItem) {
                dd($existingItem->update($request->all()['item']));
                return $existingItem;
            }

            return 'Item not found';
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, int $id)
        {


        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         *
         * @return string
         */
        public function destroy($id)
        {
            $existingItem = Item::find($id);

            if ($existingItem) {
                $existingItem->delete();
                return 'Item deleted';
            }

            return 'Item not found';
        }
    }
