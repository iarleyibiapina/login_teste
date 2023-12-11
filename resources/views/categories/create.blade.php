<h1>Create</h1>

<form action="post" action="{{ route('category.store') }}">
    @csrf
    <input type="text" name="nome" id="nome" value="{{ old('name') }}">
    <label for="nome">Nome</label>
    <input type="text" name="slug" id="slug" value="{{ old('slug') }}">
    <label for="slug">slug</label>
    <button type="submit">Enviar</button>
    </form>