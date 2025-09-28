function validasiForm(){
    const nama = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (nama.trim() === "" || email.trim() === "" || password.trim() === "") {
        alert("Semua field harus diisi!");
        return false;
    }

    if (password.length < 3) {
        alert("Password minimal harus 3 karakter!");
        return false;
    }

    console.log("Validasi berhasil, data dikirim ke server.");
    return true;
}