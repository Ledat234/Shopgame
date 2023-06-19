<!-- edit.blade.php -->
<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user->email }}"
