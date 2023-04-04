<?php
// Connect to the database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "wataniah";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Get the form data
    //user
    $no_tentera = $_POST["no_tentera"];
    $pkt = $_POST["pkt"];
    $nama = $_POST["nama"];
    $no_kp = $_POST["no_kp"];
    $jantina = $_POST["jantina"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $negeri_lahir = $_POST["negeri_lahir"];
    $no_sijil = $_POST["no_sijil"];
    $agama = $_POST["agama"];
    $bangsa = $_POST["bangsa"];
    //keluarga
    $nama_bapa = $_POST["nama_bapa"];
    $nama_ibu = $_POST["nama_ibu"];
    $status_kawin = $_POST["status"];
    //pasangan_anak
    $nama_anak = $_POST["nama_anak"];
    $nama_pasangan = $_POST["nama_pasangan"];
    
    for ($i = 0; $i < count($nama_pasangan); $i++) {
        $pasangan = "INSERT INTO pasangan_anak (no_kp, nama_pasangan, nama_anak) 
        VALUES ('$no_kp', '" . mysqli_real_escape_string($conn, $nama_pasangan[$i]) . "', '" . mysqli_real_escape_string($conn, $nama_anak[$i]) . "')";
        mysqli_query($conn, $pasangan);
      }

    //kelulusan
    $kelulusan = $_POST["kelulusan"];
    $bidang = $_POST["bidang"];
    $tahun_lulus = $_POST["tahun_lulus"];

    for ($i = 0; $i < count($kelulusan); $i++) {
        $bidang = "INSERT INTO kelulusan(no_kp, kelulusan, bidang, tahun)
        VALUES ('$no_kp', '" . mysqli_real_escape_string($conn, $kelulusan[$i]) . "', '" . mysqli_real_escape_string($conn, $bidang[$i]) . "', '" . mysqli_real_escape_string($conn, $tahun_lulus[$i]) . "')";
        mysqli_query($conn, $bidang);
      }

    //kerja
    $agensi = $_POST["agensi"];
    $jawatan = $_POST["jawatan"];
    $tahun_mula = $_POST["tahun_mula"];
    $tahun_akhir = $_POST["tahun_akhir"];
    
    for ($i = 0; $i < count($agensi); $i++) {
        $kerja = "INSERT INTO p_kerja(no_kp, agensi, jawatan, tahun_mula, tahun_akhir)
        VALUES ('$no_kp', '" . mysqli_real_escape_string($conn, $agensi[$i]) . "', '" . mysqli_real_escape_string($conn, $jawatan[$i]) . "', '" . mysqli_real_escape_string($conn, $tahun_mula[$i]) . "', '" . mysqli_real_escape_string($conn, $tahun_akhir[$i]) . "')";
        mysqli_query($conn, $kerja);
      }
    //angkat sumpah
    $tarikh_angkat_sumpah = $_POST["tarikh_angkat_sumpah"];
    $tempoh_khidmat = $_POST["tempoh_khidmat"];
    $tempat_angkat_sumpah = $_POST["tempat_angkat_sumpah"];



// Insert the data into the database
$user = "INSERT INTO user(no_tentera, pangkat, nama, no_kp, jantina, tempat_lahir, negeri_lahir, no_sijil, agama, bangsa) 
        VALUES ('$no_tentera','$pkt','$nama','$no_kp','$jantina','$tempat_lahir','$negeri_lahir','$no_sijil','$agama','$bangsa')";

$keluarga = "INSERT INTO keluarga(no_kp, nama_bapa, nama_ibu, status_kawin) 
        VALUES ('$no_kp','$nama_bapa','$nama_ibu','$status_kawin')";

$angkat_sumpah = "INSERT INTO a_sumpah(no_kp, tarikh_sumpah, tmph_khidmat, tempat) 
        VALUES ('$no_kp','$tarikh_angkat_sumpah','$tempoh_khidmat','$tempat_angkat_sumpah')";



if(mysqli_query($conn, $user) && mysqli_query($conn, $keluarga)&& mysqli_query($conn, $angkat_sumpah)) {
    echo "Records inserted successfully.";
    header('Location: index.php');
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}