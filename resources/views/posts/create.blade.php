@extends('common.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12"> {{-- These divs are needed for proper layout --}}
                    <form method="POST" action="{{ route('posts.store') }}">
                        <div class="card"> {{-- The form is placed inside a Bulma Card component --}}
                            <header class="card-header">
                                <p class="card-header-title"> {{-- The Card header content --}}
                                    Add a new article
                                </p>
                            </header>

                            <div class="card-content">
                                <div class="content">

                                    {{-- Here are all the form fields --}}
                                    <div class="field">
                                        <label class="label">Title</label>
                                        <div class="control">
                                            <input name="title" class="input @error('title') is-danger @enderror"
                                                   type="text" placeholder="Your title here...">
                                        </div>
                                        @error('title')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Excerpt</label>
                                        <div class="control">
                                            <textarea name="excerpt"
                                                      class="textarea @error('excerpt') is-danger @enderror"
                                                      type="text" placeholder="A short summary..."></textarea>
                                        </div>
                                        @error('excerpt')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Content</label>
                                        <div class="control">
                                            <textarea name="body" class="textarea @error('body') is-danger @enderror"
                                                      rows="15" placeholder="The main text of your article..."></textarea>
                                        </div>
                                        @error('body')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="field is-grouped">
                                    {{-- Here are the form buttons: save, reset and cancel --}}
                                    <div class="control">
                                        <button type="submit" class="button is-primary">Save</button>
                                    </div>
                                    <div class="control">
                                        <button type="reset" class="button is-warning">Reset</button>
                                    </div>
                                    <div class="control">
                                        <a type="button" href="/posts" class="button is-light">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


