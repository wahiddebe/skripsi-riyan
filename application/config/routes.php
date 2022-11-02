<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'UserController/showLogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/

$route['berita/(:any)'] = 'BeritaController/set_data/$1';

//url untuk load form di browser
$route['form/form1'] = 'FormController/showForm1';

//url untuk user
$route['login']['get'] = 'UserController/showLogin';
$route['login']['post'] = 'UserController/login';
$route['logout'] = 'UserController/logout';
$route['ubahPassword']['get'] = 'UserController/showUbahPassword';
$route['ubahPassword']['post'] = 'UserController/ubahPassword';




//url mahasiswa
$route['mahasiswa']['get'] = 'MahasiswaController/showBeranda';
$route['mahasiswa/Note']['get'] = 'MahasiswaController/note';
$route['admin/mahasiswa'] = 'MahasiswaController/showListMahasiswa';
$route['admin/getMahasiswa/(:any)'] = 'MahasiswaController/getMahasiswa/$1';
$route['admin/submitMahasiswa'] = 'MahasiswaController/submitMahasiswa';
$route['admin/resetMahasiswa/(:any)'] = 'MahasiswaController/showDataReset/$1';
$route['admin/resetMahasiswa']['post'] = 'MahasiswaController/resetMahasiswa';
$route['adminKP/mahasiswa'] = 'MahasiswaController/showListMahasiswa';
$route['adminKP/getMahasiswa/(:any)'] = 'MahasiswaController/getMahasiswa/$1';
$route['adminKP/submitMahasiswa'] = 'MahasiswaController/submitMahasiswa';
$route['adminKP/resetMahasiswa/(:any)'] = 'MahasiswaController/showDataReset/$1';
$route['adminKP/resetMahasiswa']['post'] = 'MahasiswaController/resetMahasiswa';
$route['adminMagang/mahasiswa'] = 'MahasiswaController/showListMahasiswa';
$route['adminMagang/getMahasiswa/(:any)'] = 'MahasiswaController/getMahasiswa/$1';
$route['adminMagang/submitMahasiswa'] = 'MahasiswaController/submitMahasiswa';
$route['adminMagang/resetMahasiswa/(:any)'] = 'MahasiswaController/showDataReset/$1';
$route['adminMagang/resetMahasiswa']['post'] = 'MahasiswaController/resetMahasiswa';

//url untuk KP
$route['mahasiswa/FormKP']['get'] = 'KPController/showFormDaftarKP';
$route['mahasiswa/FormKP']['post'] = 'KPController/saveKP';
$route['adminKP/KP/(:any)'] = 'KPController/showListKP/$1';
$route['adminKP/getKP/(:any)/(:any)'] = 'KPController/getKP/$1/$2';
$route['adminKP/getKP/(:any)/(:any)/(:any)/(:any)'] = 'KPController/getKP/$1/$2/$3/$4';
$route['adminKP/submitKP'] = 'KPController/submitKP';
$route['adminKP/hapusKP/(:any)/(:any)'] = 'KPController/showDataHapus/$1/$2';
$route['adminKP/hapusKP']['post'] = 'KPController/hapusKP';

//url untuk magang
$route['mahasiswa/FormMagang']['get'] = 'MagangController/showFormDaftarMagang';
$route['mahasiswa/FormMagang']['post'] = 'MagangController/saveMagang';
$route['adminMagang/Magang/(:any)'] = 'MagangController/showListMagang/$1';
$route['adminMagang/getMagang/(:any)'] = 'MagangController/getMagang/$1';
$route['adminMagang/getMagang/(:any)/(:any)'] = 'MagangController/getMagang/$1/$2';
$route['adminMagang/getMagang/(:any)/(:any)/(:any)'] = 'MagangController/getMagang/$1/$2/$3';
$route['adminMagang/submitMagang'] = 'MagangController/submitMagang';
$route['adminMagang/hapusMagang/(:any)/(:any)'] = 'MagangController/showDataHapus/$1/$2';
$route['adminMagang/hapusMagang']['post'] = 'MagangController/hapusMagang';


//url untuk SuratKP
$route['mahasiswa/formSuratKP']['get'] = 'SuratKPController/showformSuratKP';
$route['mahasiswa/formSuratKP']['post'] = 'SuratKPController/saveSuratKP';
$route['mahasiswa/formSuratMagang']['get'] = 'SuratMagangController/showformSuratMagang';
$route['mahasiswa/formSuratMagang']['post'] = 'SuratMagangController/saveSuratMagang';
$route['adminKP/SuratKP/(:any)'] = 'SuratKPController/showListSuratKP/$1';
$route['adminKP/PerusahaanKP/(:any)'] = 'SuratKPController/showListPerusahaanKP/$1';
$route['adminKP/getSuratKP/(:any)/(:any)/(:any)'] = 'SuratKPController/getSuratKP/$1/$2/$3';
$route['adminKP/submitSuratKP'] = 'SuratKPController/submitSuratKP';
$route['adminKP/hapusSuratKP/(:any)/(:any)/(:any)'] = 'SuratKPController/showDataHapus/$1/$2/$3';
$route['adminKP/hapusSuratKP/(:any)']['post'] = 'SuratKPController/hapusSuratKP/$1';

//url untuk SuratMagang
$route['mahasiswa/formSuratMagang']['get'] = 'SuratMagangController/showformSuratMagang';
$route['mahasiswa/formSuratMagang']['post'] = 'SuratMagangController/saveSuratMagang';
$route['adminMagang/SuratMagang/(:any)'] = 'SuratMagangController/showListSuratMagang/$1';
$route['adminMagang/PerusahaanMagang/(:any)'] = 'SuratMagangController/showListPerusahaanMagang/$1';
$route['adminMagang/getSuratMagang/(:any)/(:any)/(:any)'] = 'SuratMagangController/getSuratMagang/$1/$2/$3';
$route['adminMagang/submitSuratMagang'] = 'SuratMagangController/submitSuratMagang';
$route['adminMagang/hapusSuratMagang/(:any)/(:any)/(:any)'] = 'SuratMagangController/showDataHapus/$1/$2/$3';
$route['adminMagang/hapusSuratMagang/(:any)']['post'] = 'SuratMagangController/hapusSuratMagang/$1';


//url untuk TA
$route['mahasiswa/FormTA']['get'] = 'TugasAkhirController/showFormDaftarTA';
$route['mahasiswa/FormTA']['post'] = 'TugasAkhirController/saveTA';
$route['admin/tugasAkhir/(:any)'] = 'TugasAkhirController/showListTA/$1';
$route['admin/getTugasAkhir/(:any)/(:any)/(:any)/(:any)'] = 'TugasAkhirController/getTugasAkhir/$1/$2/$3/$4';
$route['admin/submitTugasAkhir'] = 'TugasAkhirController/submitTugasAkhir';
$route['admin/hapusTA/(:any)/(:any)'] = 'TugasAkhirController/showDataHapus/$1/$2';
$route['admin/hapusTA']['post'] = 'TugasAkhirController/hapusTA';

//url untuk dosen
$route['admin/dosen'] = 'DosenController/showListDosen';
$route['admin/dosen/detail/(:any)'] = 'DosenController/detailDosen/$1';
$route['admin/getDosen/(:any)'] = 'DosenController/getDosen/$1';
$route['admin/submitDosen'] = 'DosenController/submitDosen';
$route['admin/hapusDosen/(:any)'] = 'DosenController/showDataHapus/$1';
$route['admin/hapusDosen']['post'] = 'DosenController/hapusDosen';
$route['adminKP/dosen'] = 'DosenController/showListDosen';
$route['adminKP/getDosen/(:any)'] = 'DosenController/getDosen/$1';
$route['adminKP/submitDosen'] = 'DosenController/submitDosen';
$route['adminKP/hapusDosen/(:any)'] = 'DosenController/showDataHapus/$1';
$route['adminKP/hapusDosen']['post'] = 'DosenController/hapusDosen';
$route['adminMagang/dosen'] = 'DosenController/showListDosen';
$route['adminMagang/getDosen/(:any)'] = 'DosenController/getDosen/$1';
$route['adminMagang/submitDosen'] = 'DosenController/submitDosen';
$route['adminMagang/hapusDosen/(:any)'] = 'DosenController/showDataHapus/$1';
$route['adminMagang/hapusDosen']['post'] = 'DosenController/hapusDosen';

//url untuk SOP
$route['mahasiswa/SOP'] = 'SOPController/showListSOP';
$route['admin/SOP'] = 'SOPController/showListSOP';
$route['admin/getSOP/(:any)'] = 'SOPController/getSOP/$1';
$route['admin/submitSOP']['post'] = 'SOPController/submitSOP';
$route['admin/hapusSOP/(:any)/(:any)'] = 'SOPController/showDataHapus/$1/$2';
$route['admin/hapusSOP']['post'] = 'SOPController/hapusSOP';
$route['adminKP/SOP'] = 'SOPController/showListSOP';
$route['adminKP/getSOP/(:any)'] = 'SOPController/getSOP/$1';
$route['adminKP/submitSOP']['post'] = 'SOPController/submitSOP';
$route['adminKP/hapusSOP/(:any)/(:any)'] = 'SOPController/showDataHapus/$1/$2';
$route['adminKP/hapusSOP']['post'] = 'SOPController/hapusSOP';
$route['adminMagang/SOP'] = 'SOPController/showListSOP';
$route['adminMagang/getSOP/(:any)'] = 'SOPController/getSOP/$1';
$route['adminMagang/submitSOP']['post'] = 'SOPController/submitSOP';
$route['adminMagang/hapusSOP/(:any)/(:any)'] = 'SOPController/showDataHapus/$1/$2';
$route['adminMagang/hapusSOP']['post'] = 'SOPController/hapusSOP';

//url untuk Instruksi Kerja
$route['mahasiswa/InstruksiKerja'] = 'InstruksiKerjaController/showListInstruksiKerja';
$route['admin/InstruksiKerja'] = 'InstruksiKerjaController/showListInstruksiKerja';
$route['admin/getInstruksiKerja/(:any)'] = 'InstruksiKerjaController/getInstruksiKerja/$1';
$route['admin/submitInstruksiKerja']['post'] = 'InstruksiKerjaController/submitInstruksiKerja';
$route['admin/hapusInstruksiKerja/(:any)/(:any)'] = 'InstruksiKerjaController/showDataHapus/$1/$2';
$route['admin/hapusInstruksiKerja']['post'] = 'InstruksiKerjaController/hapusInstruksiKerja';
$route['adminKP/InstruksiKerja'] = 'InstruksiKerjaController/showListInstruksiKerja';
$route['adminKP/getInstruksiKerja/(:any)'] = 'InstruksiKerjaController/getInstruksiKerja/$1';
$route['adminKP/submitInstruksiKerja']['post'] = 'InstruksiKerjaController/submitInstruksiKerja';
$route['adminKP/hapusInstruksiKerja/(:any)/(:any)'] = 'InstruksiKerjaController/showDataHapus/$1/$2';
$route['adminKP/hapusInstruksiKerja']['post'] = 'InstruksiKerjaController/hapusInstruksiKerja';
$route['adminMagang/InstruksiKerja'] = 'InstruksiKerjaController/showListInstruksiKerja';
$route['adminMagang/getInstruksiKerja/(:any)'] = 'InstruksiKerjaController/getInstruksiKerja/$1';
$route['adminMagang/submitInstruksiKerja']['post'] = 'InstruksiKerjaController/submitInstruksiKerja';
$route['adminMagang/hapusInstruksiKerja/(:any)/(:any)'] = 'InstruksiKerjaController/showDataHapus/$1/$2';
$route['adminMagang/hapusInstruksiKerja']['post'] = 'InstruksiKerjaController/hapusInstruksiKerja';

//url untuk Berkas TA
$route['mahasiswa/BerkasTA'] = 'BerkasTAController/showListBerkasTA';
$route['admin/BerkasTA'] = 'BerkasTAController/showListBerkasTA';
$route['admin/getBerkasTA/(:any)'] = 'BerkasTAController/getBerkasTA/$1';
$route['admin/submitBerkasTA']['post'] = 'BerkasTAController/submitBerkasTA';
$route['admin/hapusBerkasTA/(:any)/(:any)'] = 'BerkasTAController/showDataHapus/$1/$2';
$route['admin/hapusBerkasTA']['post'] = 'BerkasTAController/hapusBerkasTA';

//url untuk Berkas Magang
$route['mahasiswa/BerkasMagang'] = 'BerkasMagangController/showListBerkasMagang';
$route['adminMagang/BerkasMagang'] = 'BerkasMagangController/showListBerkasMagang';
$route['adminMagang/getBerkasMagang/(:any)'] = 'BerkasMagangController/getBerkasMagang/$1';
$route['adminMagang/submitBerkasMagang']['post'] = 'BerkasMagangController/submitBerkasMagang';
$route['adminMagang/hapusBerkasMagang/(:any)/(:any)'] = 'BerkasMagangController/showDataHapus/$1/$2';
$route['adminMagang/hapusBerkasMagang']['post'] = 'BerkasMagangController/hapusBerkasMagang';

//url untuk Berkas KP
$route['mahasiswa/BerkasKP'] = 'BerkasKPController/showListBerkasKP';
$route['adminKP/BerkasKP'] = 'BerkasKPController/showListBerkasKP';
$route['adminKP/getBerkasKP/(:any)'] = 'BerkasKPController/getBerkasKP/$1';
$route['adminKP/submitBerkasKP']['post'] = 'BerkasKPController/submitBerkasKP';
$route['adminKP/hapusBerkasKP/(:any)/(:any)'] = 'BerkasKPController/showDataHapus/$1/$2';
$route['adminKP/hapusBerkasKP']['post'] = 'BerkasKPController/hapusBerkasKP';

//url untuk Sidang
$route['mahasiswa/FormSidang']['get']  = 'SidangController/showFormDaftarSidang';
$route['mahasiswa/FormSidang']['post'] = 'SidangController/saveSidang';
$route['TU/Sidang/(:any)'] = 'SidangController/showListSidang/$1';
$route['TU/persetujuanSidang'] = 'SidangController/getListSidangNonApprove';
$route['TU/getSidang/(:any)/(:any)'] = 'SidangController/getSidang/$1/$2';
$route['TU/submitSidang/(:any)']['post'] = 'SidangController/submitSidang/$1';
$route['TU/hapusSidang/(:any)/(:any)'] = 'SidangController/showDataHapus/$1/$2';
$route['TU/hapusSidang']['post'] = 'SidangController/hapusSidang';

//url untuk Seminar
$route['mahasiswa/FormSeminar']['get']  = 'SeminarController/showFormDaftarSeminar';
$route['mahasiswa/FormSeminar']['post'] = 'SeminarController/saveSeminar';
$route['TU/Seminar/(:any)'] = 'SeminarController/showListSeminar/$1';
$route['TU'] = 'SeminarController/getListSeminarNonApprove';
$route['TU/getSeminar/(:any)/(:any)'] = 'SeminarController/getSeminar/$1/$2';
$route['TU/submitSeminar/(:any)']['post'] = 'SeminarController/submitSeminar/$1';
$route['TU/hapusSeminar/(:any)/(:any)'] = 'SeminarController/showDataHapus/$1/$2';
$route['TU/hapusSeminar']['post'] = 'SeminarController/hapusSeminar';

//url untuk Seminar KP
$route['mahasiswa/FormSeminarKP']['get']  = 'SeminarKPController/showFormDaftarSeminarKP';
$route['mahasiswa/FormSeminarKP']['post'] = 'SeminarKPController/saveSeminarKP';
$route['TU/SeminarKP/(:any)'] = 'SeminarKPController/showListSeminarKP/$1';
$route['TU/KP'] = 'SeminarKPController/getListSeminarKPNonApprove';
$route['TU/getSeminarKP/(:any)/(:any)'] = 'SeminarKPController/getSeminarKP/$1/$2';
$route['TU/submitSeminarKP/(:any)']['post'] = 'SeminarKPController/submitSeminarKP/$1';
$route['TU/hapusSeminarKP/(:any)/(:any)'] = 'SeminarKPController/showDataHapus/$1/$2';
$route['TU/hapusSeminarKP']['post'] = 'SeminarKPController/hapusSeminarKP';

//url untuk excel
$route['admin/import']['import'] = 'Excel_importController/import';

//ul untuk akun dosen
$route['Dosen/Home'] = 'DosenController/showHome';
$route['Dosen/BimbinganTA'] = 'TugasAkhirController/showBimbinganTA';
$route['Dosen/BimbinganMagang'] = 'MagangController/showBimbinganMagang';
$route['Dosen/BimbinganKP'] = 'KPController/showBimbinganKP';
$route['Dosen/jadwalSidangTA'] = 'SidangController/ShowJadwalSidangTA';
$route['Dosen/jadwalSeminarTA'] = 'SeminarController/ShowJadwalSeminarTA';
$route['Dosen/jadwalSeminarKP'] = 'SeminarKPController/ShowJadwalSeminarKP';

//

$route['Dosen/submitPenilaian']['post'] = 'PenilaianController/insert';
$route['Dosen/getPenilaian/(:any)'] = 'PenilaianController/getPenilaian/$1';
// $route['Dosen/showPenilaian/(:any)/(:any)/(:any)/(:any)'] = 'PenilaianController/showPenilaian/$1/$2/$3/$4';
$route['Dosen/showPenilaian']['post'] = 'PenilaianController/showPenilaian';
