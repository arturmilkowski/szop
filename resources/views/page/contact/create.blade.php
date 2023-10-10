<x-layout>
    <x-slot:title>Kontakt</x-slot>
    <h1 class="mx-2 mt-20">Kontakt</h1>
    <form class="mt-4 mx-2 w-1/2" action="{{ route('pages.contacts.store') }}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <x-form-group1>
            <x-input-label1 for="subject">Temat</x-input-label1>
            <x-text-input1 name="subject" id="subject" value="{{ old('subject') }}" placeholder="Temat wiadomości" required />
            @error('subject')
            <x-input-error1>{{ $message }}</x-input-error1>
            @enderror
          </x-form-group1>
          <x-form-group1>
            <x-input-label1 for="content">Treść</x-input-label1>
            <x-textarea-input1 name="content" id="content" placeholder="Treść wiadomości" required>{{ old('content') }}</x-textarea-input1>
            @error('content')
            <x-input-error1>{{ $message }}</x-input-error1>
            @enderror
          </x-form-group1>
          <x-form-group1>
            <x-input-label1 for="author">Podpis</x-input-label1>
            <x-text-input1 type="text" name="author" id="author" value="{{ old('author') }}" placeholder="Podpis" />
            @error('author')
            <x-input-error1>{{ $message }}</x-input-error1>
            @enderror
          </x-form-group1>
          <x-form-group1>
            <x-input-label1 for="email">E-mail</x-input-label1>
            <x-text-input1 type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required />
            @error('email')
            <x-input-error1>{{ $message }}</x-input-error1>
            @enderror
          </x-form-group1>
          <div class="human">
            <input type="checkbox" id="human" name="i_am_not_a_robot">
            <label for="human">I am not a robot</label>
          </div>
          <div><x-btn1>Wyślij</x-btn1></div>
    </form>
</x-layout>
