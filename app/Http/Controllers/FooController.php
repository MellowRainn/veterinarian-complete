<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StorefooRequest;
    use App\Http\Requests\UpdatefooRequest;
    use App\Models\foo;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;

    class FooController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index(): View|Factory|Application
        {
            $foos = foo::all();
            return view('foos.index', compact('foos'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|View
         */
        public function create(): Application|Factory|View
        {
            return view('foos.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param StorefooRequest $request
         * @return RedirectResponse
         */
        public function store(StorefooRequest $request): RedirectResponse
        {
            foo::create($request->validate([
                'name' => 'required',
                'thud' => 'required',
                'wombat' => 'required'
            ]));

            return redirect()->route('foos.index')->with('success', 'New Foo has been created.');
        }

        /**
         * Display the specified resource.
         *
         * @param foo $foo
         * @return Application|Factory|View
         */
        public function show(foo $foo): View|Factory|Application
        {
            return view('foos.show', compact('foo'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param foo $foo
         * @return Application|Factory|View
         */
        public function edit(foo $foo): View|Factory|Application
        {
            return view('foos.edit', compact('foo'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param UpdatefooRequest $request
         * @param foo $foo
         * @return RedirectResponse
         */
        public function update(UpdatefooRequest $request, foo $foo): RedirectResponse
        {
            $foo->update($request->validate([
                'name' => 'required',
                'thud' => 'required',
                'wombat' => 'required'
            ]));
            return redirect()->route('foos.show', $foo)->with('success', 'Edited the Foo');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param foo $foo
         * @return RedirectResponse
         */
        public function destroy(foo $foo): RedirectResponse
        {
            $foo->delete();
            return redirect(route('foos.index'));
//            return redirect()->route('foos.index')->with('success', 'Deleted Foo');
        }
    }
