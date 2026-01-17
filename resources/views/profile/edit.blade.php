@extends('layouts.profile')

@section('content')
<div class="profile-card">

    <h2>EDIT INFORMASI AKUN</h2>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <label>Nama Lengkap</label>
        <input type="text" name="name" value="{{ $user->name }}">

        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}">

        <div class="form-group password-group">
    <label>Password</label>
    <div class="password-wrapper">
        <input 
            type="password" 
            name="password" 
            id="password"
            placeholder="Kosongkan jika tidak ingin mengubah password"
        >
        <span class="toggle-password" onclick="togglePassword()">👁️</span>
    </div>
</div>

        <label>No Telepon</label>
        <input type="text" name="no_hp" value="{{ $user->no_hp }}">

        <div class="form-actions">
            <a href="{{ route('profile.show') }}" class="btn">Batal</a>
            <button type="submit" class="btn primary">Simpan</button>
        </div>
    </form>

    <script>
function togglePassword() {
    const passwordField = document.getElementById('password');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
}
</script>

</div>
@endsection
