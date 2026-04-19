<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\VisionMission;
use App\Models\OrganizationalStructure;
use App\Models\Leader;
use App\Models\Staff;
use App\Models\Gallery;
use App\Models\BudgetRealization;
use App\Models\Service;
use App\Models\News;
use App\Models\Research;
use App\Models\Ppm;
use App\Models\Restra;
use App\Models\Performance;
use App\Models\Cooperation;
use App\Models\StudyCenter;
use App\Models\User;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@lppm.unik.ac.id')->first();

        // ── 1. PROFILE ────────────────────────────────────────────────
        if (Profile::count() === 0) {
            Profile::create([
                'title'   => 'LPPM Universitas Islam KH. Ruhiyat Cipasung',
                'content' => '<p>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Universitas Islam KH. Ruhiyat Cipasung merupakan unsur pelaksana akademik yang bertugas mengkoordinasikan, memantau, dan menilai pelaksanaan kegiatan penelitian dan pengabdian kepada masyarakat.</p>
<p>LPPM UNIK Cipasung didirikan pada tahun 2010 bersamaan dengan perkembangan Universitas Islam KH. Ruhiyat yang berlokasi di Pondok Pesantren Cipasung, Kecamatan Singaparna, Kabupaten Tasikmalaya, Jawa Barat. Universitas ini lahir dari rahim pesantren yang didirikan oleh KH. Ruhiyat, seorang ulama kharismatik yang memiliki visi besar dalam pengembangan pendidikan Islam di Indonesia.</p>
<p>Sejak awal berdirinya, LPPM telah memainkan peran strategis dalam mendukung Tri Dharma Perguruan Tinggi, khususnya pada pilar penelitian dan pengabdian masyarakat. LPPM menjadi jembatan antara dunia akademik kampus dengan kebutuhan nyata masyarakat, terutama di lingkungan pesantren dan pedesaan Tasikmalaya.</p>
<h3>Sejarah Singkat</h3>
<p>Pada periode 2010–2015, LPPM berfokus pada penguatan kapasitas dosen dalam melakukan penelitian dasar dan terapan. Berbagai pelatihan metodologi penelitian dan penulisan karya ilmiah diselenggarakan secara intensif. Pada 2016–2020, LPPM berhasil meningkatkan perolehan hibah penelitian dari Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemendikbudristek), serta memperluas program pengabdian masyarakat ke seluruh kecamatan di Kabupaten Tasikmalaya.</p>
<p>Memasuki era 2021 hingga sekarang, LPPM bertransformasi dengan mengadopsi paradigma penelitian berbasis luaran (output-based research) dan mendorong hilirisasi riset yang berdampak langsung pada masyarakat. LPPM juga aktif menjalin kerjasama dengan perguruan tinggi lain, lembaga pemerintah, dan sektor swasta dalam rangka memperkuat ekosistem riset dan inovasi di lingkungan UNIK Cipasung.</p>',
            ]);
        }

        // ── 2. VISI MISI ──────────────────────────────────────────────
        if (VisionMission::count() === 0) {
            VisionMission::create([
                'vision'  => 'Menjadi lembaga penelitian dan pengabdian kepada masyarakat yang unggul, islami, dan berdaya saing nasional dalam pengembangan ilmu pengetahuan, teknologi, dan seni berbasis nilai-nilai pesantren pada tahun 2030.',
                'mission' => '<ol>
<li>Menyelenggarakan penelitian berkualitas yang berorientasi pada pengembangan ilmu pengetahuan, teknologi, dan pemecahan masalah kebangsaan yang berlandaskan nilai-nilai Islam.</li>
<li>Melaksanakan kegiatan pengabdian kepada masyarakat yang relevan, inovatif, dan memberdayakan komunitas pesantren serta masyarakat sekitar.</li>
<li>Membangun kemitraan strategis dengan perguruan tinggi, pemerintah, industri, dan masyarakat untuk memperkuat ekosistem riset dan inovasi.</li>
<li>Meningkatkan kapasitas sumber daya manusia peneliti melalui pelatihan, mentoring, dan fasilitasi publikasi ilmiah bereputasi.</li>
<li>Mengelola dan mendiseminasikan hasil penelitian dan pengabdian secara sistematis untuk memberikan manfaat maksimal bagi pembangunan bangsa.</li>
<li>Mengembangkan pusat-pusat studi yang relevan dengan kebutuhan masyarakat dan bangsa berdasarkan kekhasan keilmuan UNIK Cipasung.</li>
</ol>',
            ]);
        }

        // ── 3. STRUKTUR ORGANISASI ────────────────────────────────────
        if (OrganizationalStructure::count() === 0) {
            OrganizationalStructure::create([
                'title'       => 'Struktur Organisasi LPPM UNIK Cipasung 2024–2028',
                'description' => 'Struktur organisasi LPPM UNIK Cipasung terdiri dari Ketua LPPM yang bertanggung jawab langsung kepada Rektor, dibantu oleh Sekretaris LPPM. Di bawahnya terdapat Kepala Pusat Penelitian, Kepala Pusat Pengabdian kepada Masyarakat, dan Kepala Pusat Kerjasama & Publikasi. Masing-masing kepala pusat dibantu oleh staf administrasi dan reviewer internal.',
                'image'       => null,
            ]);
        }

        // ── 4. PIMPINAN ────────────────────────────────────────────────
        if (Leader::count() === 0) {
            $leaders = [
                ['name' => 'Dr. H. Ahmad Fauzi, M.Pd.', 'position' => 'Ketua LPPM', 'biography' => 'Dr. H. Ahmad Fauzi, M.Pd. adalah dosen senior Fakultas Tarbiyah UNIK Cipasung dengan keahlian di bidang Manajemen Pendidikan Islam. Beliau menyelesaikan studi S3 di Universitas Islam Negeri Sunan Gunung Djati Bandung. Aktif dalam berbagai penelitian hibah Kemendikbudristek dan telah mempublikasikan lebih dari 25 artikel di jurnal nasional terakreditasi.', 'email' => 'ahmfauzi@unik.ac.id', 'phone' => '0812-3456-7890', 'order' => 1],
                ['name' => 'Dr. Hj. Siti Fatimah, M.Si.', 'position' => 'Sekretaris LPPM', 'biography' => 'Dr. Hj. Siti Fatimah, M.Si. adalah dosen Fakultas Syariah UNIK Cipasung dengan latar belakang keilmuan Sosiologi Agama. Beliau aktif dalam penelitian gender dan pemberdayaan perempuan di lingkungan pesantren, serta telah menghasilkan beberapa buku referensi akademik.', 'email' => 'sitifatimah@unik.ac.id', 'phone' => '0813-5678-9012', 'order' => 2],
                ['name' => 'Dr. Deden Nurbayani, M.Pd.', 'position' => 'Kepala Pusat Penelitian', 'biography' => 'Dr. Deden Nurbayani, M.Pd. menekuni bidang Pendidikan Bahasa Arab dan Linguistik Terapan. Pernah mengikuti program research fellowship di Universiti Kebangsaan Malaysia. Memiliki rekam jejak riset yang kuat dengan lebih dari 30 publikasi ilmiah.', 'email' => 'dedennurb@unik.ac.id', 'phone' => '0856-7890-1234', 'order' => 3],
                ['name' => 'Drs. H. Wahyu Hidayat, M.Pd.I.', 'position' => 'Kepala Pusat Pengabdian Masyarakat', 'biography' => 'Drs. H. Wahyu Hidayat, M.Pd.I. adalah dosen Fakultas Dakwah yang berpengalaman dalam program pemberdayaan masyarakat berbasis pesantren. Telah memimpin lebih dari 50 program PKM di wilayah Priangan Timur.', 'email' => 'wahyuhidayat@unik.ac.id', 'phone' => '0823-4567-8901', 'order' => 4],
            ];
            foreach ($leaders as $leader) {
                Leader::create($leader);
            }
        }

        // ── 5. STAF ────────────────────────────────────────────────────
        if (Staff::count() === 0) {
            $staffData = [
                ['name' => 'Asep Saefulloh, S.Pd.', 'position' => 'Staf Administrasi Umum', 'email' => 'asep.saef@unik.ac.id', 'phone' => '0877-1234-5678', 'order' => 1],
                ['name' => 'Nenden Hasanah, S.Kom.', 'position' => 'Staf Teknologi Informasi & Publikasi', 'email' => 'nenden.h@unik.ac.id', 'phone' => '0878-2345-6789', 'order' => 2],
                ['name' => 'Ujang Suherman, S.E.', 'position' => 'Staf Keuangan & Pelaporan', 'email' => 'ujang.suh@unik.ac.id', 'phone' => '0879-3456-7890', 'order' => 3],
                ['name' => 'Yeni Kusniawati, S.H.', 'position' => 'Staf Kerjasama & Hukum', 'email' => 'yeni.kusn@unik.ac.id', 'phone' => '0881-4567-8901', 'order' => 4],
                ['name' => 'Irfan Dimyati, S.Ag.', 'position' => 'Staf Pengabdian Masyarakat', 'email' => 'irfan.dim@unik.ac.id', 'phone' => '0882-5678-9012', 'order' => 5],
                ['name' => 'Rini Yulianti, A.Md.', 'position' => 'Staf Kearsipan & Dokumentasi', 'email' => 'rini.yul@unik.ac.id', 'phone' => '0883-6789-0123', 'order' => 6],
            ];
            foreach ($staffData as $s) {
                Staff::create($s);
            }
        }

        // ── 6. GALERI ─────────────────────────────────────────────────
        if (Gallery::count() === 0) {
            $galleries = [
                ['title' => 'Seminar Nasional Penelitian dan Pengabdian 2024', 'description' => 'LPPM UNIK Cipasung menyelenggarakan Seminar Nasional Penelitian dan Pengabdian kepada Masyarakat dengan tema "Riset Inovatif untuk Kemandirian Bangsa" yang dihadiri lebih dari 200 peserta dari berbagai perguruan tinggi se-Jawa Barat.', 'category' => 'kegiatan', 'event_date' => '2024-11-15'],
                ['title' => 'Pelatihan Penulisan Proposal Penelitian Hibah Dikti 2024', 'description' => 'Workshop penulisan proposal penelitian kompetitif untuk persiapan pengajuan hibah Kemendikbudristek tahun 2024. Diikuti oleh 45 dosen dari berbagai fakultas.', 'category' => 'penelitian', 'event_date' => '2024-09-20'],
                ['title' => 'Program KKN Tematik Desa Ciawi 2024', 'description' => 'Kegiatan KKN Tematik mahasiswa UNIK Cipasung di Desa Ciawi, Kecamatan Ciawi, Kabupaten Tasikmalaya dengan fokus pada pemberdayaan ekonomi masyarakat berbasis pesantren.', 'category' => 'pengabdian', 'event_date' => '2024-07-10'],
                ['title' => 'Workshop Penyusunan Laporan PKM dan Publikasi Ilmiah', 'description' => 'Workshop teknis penyusunan laporan hasil pengabdian masyarakat dan proses submission ke jurnal pengabdian terakreditasi nasional.', 'category' => 'kegiatan', 'event_date' => '2024-08-05'],
                ['title' => 'Penandatanganan MoU UNIK–Universitas Islam Bandung', 'description' => 'Penandatanganan nota kesepahaman kerjasama penelitian dan pengabdian masyarakat antara UNIK Cipasung dan Universitas Islam Bandung (UNISBA) di Bandung.', 'category' => 'kegiatan', 'event_date' => '2024-06-12'],
                ['title' => 'Pengabdian Masyarakat Pesantren Darussalam Ciamis', 'description' => 'Program pengabdian masyarakat di Pondok Pesantren Darussalam, Ciamis, berupa pelatihan keterampilan digital dan literasi keuangan bagi santri dan wali santri.', 'category' => 'pengabdian', 'event_date' => '2024-05-18'],
                ['title' => 'Monitoring dan Evaluasi Penelitian Semester Genap 2024', 'description' => 'Kegiatan monev internal penelitian dosen UNIK Cipasung yang didanai dana internal kampus. Sebanyak 32 penelitian dipresentasikan di hadapan reviewer.', 'category' => 'penelitian', 'event_date' => '2024-06-28'],
                ['title' => 'Pelatihan Penggunaan SINTA dan Google Scholar untuk Dosen', 'description' => 'Pelatihan pemanfaatan platform SINTA (Science and Technology Index) dan optimalisasi Google Scholar bagi dosen UNIK dalam rangka peningkatan indeks sitasi.', 'category' => 'kegiatan', 'event_date' => '2024-04-10'],
                ['title' => 'Program Desa Binaan LPPM di Kecamatan Singaparna 2024', 'description' => 'Kegiatan pembinaan desa binaan LPPM UNIK di Kecamatan Singaparna, Tasikmalaya, meliputi penyuluhan kesehatan, pendidikan, dan pengembangan UMKM.', 'category' => 'pengabdian', 'event_date' => '2024-03-22'],
                ['title' => 'Bedah Buku dan Diskusi Akademik Hasil Riset Dosen', 'description' => 'Kegiatan bedah buku dan diskusi akademik hasil riset dosen UNIK Cipasung yang telah diterbitkan oleh penerbit bereputasi. Dihadiri oleh civitas akademika dan mahasiswa.', 'category' => 'lainnya', 'event_date' => '2024-02-14'],
            ];
            foreach ($galleries as $g) {
                Gallery::create($g + ['image' => 'galleries/placeholder.jpg']);
            }
        }

        // ── 7. REALISASI ANGGARAN ────────────────────────────────────
        if (BudgetRealization::count() === 0) {
            $budgets = [
                ['year' => 2024, 'title' => 'Program Penelitian Internal LPPM 2024', 'budget_amount' => 450000000, 'realization_amount' => 432000000, 'percentage' => 96.00, 'description' => 'Anggaran untuk 45 judul penelitian internal dosen UNIK Cipasung tahun 2024 yang didanai dari dana DIPA universitas.'],
                ['year' => 2024, 'title' => 'Program Pengabdian Masyarakat Internal 2024', 'budget_amount' => 300000000, 'realization_amount' => 285000000, 'percentage' => 95.00, 'description' => 'Anggaran untuk 30 kegiatan PKM dosen dan mahasiswa di wilayah Kabupaten Tasikmalaya dan sekitarnya.'],
                ['year' => 2023, 'title' => 'Program Penelitian Internal LPPM 2023', 'budget_amount' => 380000000, 'realization_amount' => 361000000, 'percentage' => 95.00, 'description' => 'Anggaran untuk 38 judul penelitian internal dosen UNIK Cipasung tahun anggaran 2023.'],
                ['year' => 2023, 'title' => 'Program Pengabdian Masyarakat Internal 2023', 'budget_amount' => 250000000, 'realization_amount' => 237500000, 'percentage' => 95.00, 'description' => 'Anggaran untuk 25 kegiatan PKM dosen dan mahasiswa tahun 2023.'],
                ['year' => 2022, 'title' => 'Program Penelitian Internal LPPM 2022', 'budget_amount' => 320000000, 'realization_amount' => 298000000, 'percentage' => 93.13, 'description' => 'Anggaran untuk 32 judul penelitian internal dosen UNIK Cipasung tahun anggaran 2022.'],
                ['year' => 2022, 'title' => 'Program Pengabdian Masyarakat Internal 2022', 'budget_amount' => 200000000, 'realization_amount' => 186000000, 'percentage' => 93.00, 'description' => 'Anggaran untuk 20 kegiatan PKM dosen dan mahasiswa tahun 2022.'],
            ];
            foreach ($budgets as $b) {
                BudgetRealization::create($b);
            }
        }

        // ── 8. LAYANAN ────────────────────────────────────────────────
        if (Service::count() === 0) {
            $services = [
                ['type' => 'penelitian', 'title' => 'Penelitian Dosen Pemula', 'description' => 'Skema penelitian bagi dosen yang baru memulai karir penelitian. Memberikan pendampingan metodologi dan penulisan ilmiah untuk menghasilkan publikasi di jurnal nasional terakreditasi.', 'icon' => 'bi-lightbulb', 'order' => 1],
                ['type' => 'penelitian', 'title' => 'Penelitian Pengembangan', 'description' => 'Skema untuk penelitian yang bertujuan mengembangkan produk, metode, atau sistem baru yang bermanfaat bagi masyarakat. Didukung fasilitas laboratorium dan kemitraan industri.', 'icon' => 'bi-graph-up-arrow', 'order' => 2],
                ['type' => 'penelitian', 'title' => 'Penelitian Terapan Strategis', 'description' => 'Penelitian berorientasi luaran berupa prototipe, paten, atau kebijakan yang memberikan dampak nyata pada pengembangan ilmu dan pembangunan masyarakat.', 'icon' => 'bi-award', 'order' => 3],
                ['type' => 'pengabdian', 'title' => 'Program Kemitraan Masyarakat (PKM)', 'description' => 'Kegiatan pengabdian yang melibatkan kemitraan dengan mitra non-profit seperti desa, pesantren, dan komunitas untuk meningkatkan kesejahteraan masyarakat.', 'icon' => 'bi-people', 'order' => 1],
                ['type' => 'pengabdian', 'title' => 'KKN Tematik', 'description' => 'Kuliah Kerja Nyata dengan tema spesifik yang dirancang sesuai kebutuhan daerah sasaran, melibatkan mahasiswa lintas disiplin dengan pendampingan dosen.', 'icon' => 'bi-house-heart', 'order' => 2],
                ['type' => 'pengabdian', 'title' => 'Pengabdian Berbasis Pesantren', 'description' => 'Program khusus pengabdian yang memanfaatkan keunikan UNIK sebagai perguruan tinggi berbasis pesantren untuk pemberdayaan santri dan komunitas pesantren.', 'icon' => 'bi-stars', 'order' => 3],
                ['type' => 'kerjasama', 'title' => 'Kerjasama Antar Perguruan Tinggi', 'description' => 'Fasilitasi kerjasama penelitian bersama (joint research), pertukaran dosen dan mahasiswa, serta penyelenggaraan kegiatan akademik bersama dengan perguruan tinggi mitra.', 'icon' => 'bi-building-check', 'order' => 1],
                ['type' => 'kerjasama', 'title' => 'Kerjasama dengan Pemerintah & Industri', 'description' => 'Program kerjasama riset terapan dan pengabdian masyarakat dengan instansi pemerintah daerah, BUMN, dan perusahaan swasta untuk solusi masalah nyata.', 'icon' => 'bi-briefcase', 'order' => 2],
            ];
            foreach ($services as $s) {
                Service::create($s);
            }
        }

        // ── 9. BERITA ─────────────────────────────────────────────────
        if (News::count() === 0 && $admin) {
            $newsData = [
                ['title' => 'LPPM UNIK Cipasung Raih Klaster Utama dalam Pemeringkatan Kemenristekdikti 2024', 'content' => '<p>LPPM Universitas Islam KH. Ruhiyat Cipasung berhasil meraih status Klaster Utama dalam pemeringkatan LPPM tingkat nasional yang dilakukan oleh Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemendikbudristek) tahun 2024. Pencapaian ini merupakan lompatan signifikan dari klaster sebelumnya.</p><p>Ketua LPPM, Dr. H. Ahmad Fauzi, M.Pd., menyatakan bahwa prestasi ini merupakan buah dari kerja keras seluruh sivitas akademika UNIK dalam meningkatkan kuantitas dan kualitas penelitian serta pengabdian masyarakat dalam tiga tahun terakhir.</p>', 'is_published' => true, 'published_at' => now()->subDays(5)],
                ['title' => 'Tiga Dosen UNIK Cipasung Lolos Hibah Penelitian DIKTI 2024', 'content' => '<p>Sebanyak tiga dosen Universitas Islam KH. Ruhiyat Cipasung berhasil lolos seleksi hibah penelitian Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemendikbudristek) untuk tahun anggaran 2024. Total dana yang berhasil diraih mencapai Rp 285 juta.</p><p>Ketiga dosen tersebut adalah Dr. Deden Nurbayani (Penelitian Terapan, Rp 100 juta), Dr. Rina Mardiana (Penelitian Dasar, Rp 85 juta), dan Dr. Hj. Siti Fatimah (Penelitian Sosial Humaniora, Rp 100 juta).</p>', 'is_published' => true, 'published_at' => now()->subDays(12)],
                ['title' => 'LPPM UNIK Gelar Workshop Penulisan Artikel Jurnal Internasional', 'content' => '<p>Dalam rangka meningkatkan kapasitas peneliti, LPPM UNIK Cipasung menyelenggarakan Workshop Penulisan Artikel Jurnal Internasional yang diikuti oleh 60 dosen dari berbagai fakultas. Workshop ini menghadirkan narasumber dari Universitas Padjadjaran Bandung.</p><p>Materi yang disampaikan mencakup struktur penulisan artikel ilmiah internasional, strategi pemilihan jurnal bereputasi, teknik merespons reviewer, dan pengenalan tools anti-plagiarisme.</p>', 'is_published' => true, 'published_at' => now()->subDays(18)],
                ['title' => 'Program KKN Tematik 2024 Resmi Diluncurkan, 350 Mahasiswa Siap Bertugas', 'content' => '<p>LPPM UNIK Cipasung secara resmi meluncurkan Program KKN Tematik 2024 yang akan melibatkan 350 mahasiswa dari berbagai program studi. Program ini akan berlangsung selama 40 hari di 14 desa binaan yang tersebar di 5 kecamatan di Kabupaten Tasikmalaya.</p><p>Tema KKN Tematik tahun ini adalah "Akselerasi Pemberdayaan Desa Berbasis Potensi Lokal dan Nilai-nilai Islami". Setiap kelompok KKN akan fokus pada tiga bidang: ekonomi kreatif, pendidikan, dan kesehatan masyarakat.</p>', 'is_published' => true, 'published_at' => now()->subDays(25)],
                ['title' => 'UNIK Cipasung Jalin Kerjasama Riset dengan IPB University', 'content' => '<p>Universitas Islam KH. Ruhiyat Cipasung resmi menandatangani Memorandum of Understanding (MoU) kerjasama penelitian dan pengabdian masyarakat dengan Institut Pertanian Bogor (IPB University). Penandatanganan dilakukan oleh Rektor UNIK dan Dekan Sekolah Pascasarjana IPB.</p><p>Kerjasama ini mencakup penelitian bersama di bidang pertanian organik berbasis pesantren, pengembangan pangan halal, serta program pelatihan bagi petani di wilayah Priangan Timur.</p>', 'is_published' => true, 'published_at' => now()->subDays(32)],
                ['title' => 'Dosen UNIK Publikasikan Artikel di Jurnal Scopus Q2', 'content' => '<p>Dr. Deden Nurbayani, M.Pd., dosen Fakultas Tarbiyah UNIK Cipasung, berhasil mempublikasikan artikel ilmiahnya di jurnal terindeks Scopus berkuartal 2 (Q2), yaitu Journal of Language and Linguistic Studies. Artikel berjudul "Arabic Language Learning Innovation in Indonesian Islamic Boarding Schools" ini merupakan hasil penelitian selama dua tahun.</p>', 'is_published' => true, 'published_at' => now()->subDays(40)],
                ['title' => 'LPPM UNIK Terima Kunjungan dari Universitas Islam Negeri Bandung', 'content' => '<p>LPPM UNIK Cipasung menerima kunjungan studi banding dari tim LPPM Universitas Islam Negeri (UIN) Sunan Gunung Djati Bandung. Kunjungan ini bertujuan untuk bertukar pengalaman dalam pengelolaan penelitian dan pengabdian masyarakat berbasis pesantren.</p><p>Dalam kunjungan ini, dibahas kemungkinan kerjasama penyelenggaraan seminar bersama, joint research, dan program pertukaran dosen-mahasiswa antar kedua perguruan tinggi.</p>', 'is_published' => true, 'published_at' => now()->subDays(48)],
                ['title' => 'Panduan Pengajuan Proposal Penelitian Internal 2025 Telah Terbit', 'content' => '<p>LPPM UNIK Cipasung telah menerbitkan Panduan Pengajuan Proposal Penelitian Internal Tahun 2025. Panduan ini mencakup persyaratan, mekanisme seleksi, besaran dana, dan jadwal kegiatan penelitian internal.</p><p>Tahun 2025, LPPM menyediakan 50 slot penelitian dengan total anggaran Rp 500 juta. Tema prioritas meliputi: pendidikan Islam kontemporer, pemberdayaan ekonomi masyarakat pesantren, teknologi tepat guna, dan kesehatan masyarakat berbasis nilai Islam.</p>', 'is_published' => true, 'published_at' => now()->subDays(55)],
                ['title' => 'Mahasiswa UNIK Raih Juara 1 Program Kreativitas Mahasiswa Nasional', 'content' => '<p>Tim mahasiswa UNIK Cipasung berhasil meraih Juara 1 dalam Program Kreativitas Mahasiswa (PKM) bidang Pengabdian kepada Masyarakat (PKM-PM) pada Pekan Ilmiah Mahasiswa Nasional (PIMNAS) 2024. Tim yang beranggotakan 5 mahasiswa dari Fakultas Ekonomi ini mengangkat program pemberdayaan pengusaha batik di Kabupaten Tasikmalaya.</p>', 'is_published' => true, 'published_at' => now()->subDays(62)],
                ['title' => 'LPPM UNIK Launching Jurnal Ilmiah Terakreditasi SINTA 4', 'content' => '<p>LPPM Universitas Islam KH. Ruhiyat Cipasung resmi meluncurkan jurnal ilmiah baru bernama "Al-Bahts: Jurnal Penelitian Islam dan Kemasyarakatan" yang telah mendapatkan akreditasi SINTA peringkat 4 dari Kemendikbudristek. Jurnal ini terbit dua kali dalam setahun dan menerima artikel dari berbagai disiplin ilmu keislaman dan sosial kemasyarakatan.</p>', 'is_published' => true, 'published_at' => now()->subDays(70)],
            ];
            foreach ($newsData as $n) {
                $slug = Str::slug($n['title']);
                News::create([
                    'title'        => $n['title'],
                    'slug'         => $slug,
                    'content'      => $n['content'],
                    'user_id'      => $admin->id,
                    'is_published' => true,
                    'published_at' => $n['published_at'],
                    'views'        => rand(50, 500),
                ]);
            }
        }

        // ── 10. PENELITIAN (50 data) ──────────────────────────────────
        if (Research::count() === 0) {
            $researchers = [
                ['name' => 'Dr. H. Ahmad Fauzi, M.Pd.', 'nidn' => '0412078501'],
                ['name' => 'Dr. Hj. Siti Fatimah, M.Si.', 'nidn' => '0521079201'],
                ['name' => 'Dr. Deden Nurbayani, M.Pd.', 'nidn' => '0315088803'],
                ['name' => 'Drs. H. Wahyu Hidayat, M.Pd.I.', 'nidn' => '0628087502'],
                ['name' => 'Dr. Rina Mardiana, M.Si.', 'nidn' => '0714089401'],
                ['name' => 'Dr. Asep Mulyana, M.Pd.', 'nidn' => '0912078601'],
                ['name' => 'Dr. Nenden Hasanah, M.Pd.', 'nidn' => '1023089301'],
                ['name' => 'Dr. H. Ujang Suherman, M.M.', 'nidn' => '0811087401'],
                ['name' => 'Dra. Hj. Yeni Kusniawati, M.Pd.', 'nidn' => '0426088801'],
                ['name' => 'Dr. Irfan Dimyati, M.Pd.', 'nidn' => '0529079001'],
            ];
            $titles = [
                'Implementasi Model Pembelajaran Active Learning dalam Meningkatkan Prestasi Belajar Mahasiswa pada Mata Kuliah Statistik',
                'Analisis Kinerja Guru PAI dalam Meningkatkan Mutu Pendidikan Agama Islam di Madrasah Aliyah Tasikmalaya',
                'Pengembangan Kurikulum Berbasis Kompetensi di Perguruan Tinggi Islam: Studi Kasus UNIK Cipasung',
                'Peningkatan Kemampuan Literasi Digital Mahasiswa UNIK Cipasung melalui Program Edukasi Berkelanjutan',
                'Strategi Pengembangan Sumber Daya Manusia Berbasis Nilai-nilai Islam di Lingkungan Pesantren',
                'Pengaruh Gaya Kepemimpinan Transformasional terhadap Motivasi Kerja Dosen di Perguruan Tinggi Islam',
                'Analisis Efektivitas Pembelajaran Daring pasca Pandemi COVID-19 di UNIK Cipasung',
                'Pengembangan Media Pembelajaran Interaktif Berbasis Android untuk Mata Kuliah Fiqh Muamalah',
                'Studi Komparatif Metode Pembelajaran Al-Quran di Pesantren Wilayah Priangan Timur',
                'Peran Ulama Pesantren dalam Pemberdayaan Ekonomi Masyarakat di Kabupaten Tasikmalaya',
                'Model Pemberdayaan Perempuan Pesantren melalui Program Kewirausahaan Berbasis Kearifan Lokal',
                'Pengaruh Lingkungan Belajar terhadap Prestasi Akademik Mahasiswa Program Studi PAI',
                'Analisis Problematika Pembelajaran Bahasa Arab di Era Digital pada Perguruan Tinggi Islam',
                'Integrasi Nilai-nilai Pesantren dalam Kurikulum Program Studi Hukum Ekonomi Syariah',
                'Pengembangan Instrumen Evaluasi Pembelajaran Berbasis Higher Order Thinking Skills (HOTS)',
                'Kajian Hukum Islam terhadap Praktik Pinjaman Online (Pinjol) di Kalangan Mahasiswa',
                'Analisis Dampak Program KKN Tematik terhadap Pemberdayaan Masyarakat Desa Binaan UNIK',
                'Efektivitas Metode Sorogan dan Bandongan dalam Pembelajaran Kitab Kuning di Pesantren',
                'Studi tentang Kesadaran Hukum Waqaf di Kalangan Generasi Muda Muslim Tasikmalaya',
                'Pengembangan Model Manajemen Zakat Produktif berbasis Digital di Kabupaten Tasikmalaya',
                'Analisis Faktor-faktor yang Mempengaruhi Minat Mahasiswa Menjadi Wirausahawan Muda',
                'Penerapan Prinsip Good University Governance di Perguruan Tinggi Islam Jawa Barat',
                'Inovasi Produk Olahan Pangan Halal berbasis UMKM Pesantren di Priangan Timur',
                'Implementasi Sistem Informasi Manajemen Pesantren (SIMP) Berbasis Web',
                'Analisis Peran Teknologi Informasi dalam Transformasi Pendidikan Pesantren Modern',
                'Pengembangan Modul Ajar Pendidikan Karakter Berbasis Nilai-nilai Pesantren untuk SMA/MA',
                'Kajian Psikologis tentang Kesehatan Mental Santri di Pondok Pesantren Besar Tasikmalaya',
                'Analisis Sistem Keuangan Pesantren: Transparansi, Akuntabilitas, dan Keberlanjutan',
                'Pengembangan Pariwisata Halal Berbasis Komunitas di Kawasan Pesantren Cipasung',
                'Studi tentang Pola Asuh Orang Tua terhadap Karakter Religius Anak di Lingkungan Pesantren',
                'Model Pembelajaran Berbasis Proyek untuk Meningkatkan Kemampuan Berpikir Kritis Mahasiswa',
                'Analisis Pengaruh Budaya Organisasi terhadap Kinerja Tenaga Kependidikan di UNIK Cipasung',
                'Pengembangan Sistem E-Learning Adaptif berbasis Kecerdasan Buatan untuk Perkuliahan PAI',
                'Kajian Filantropi Islam: Optimalisasi Dana CSR untuk Pemberdayaan Pendidikan Pesantren',
                'Pengaruh Kualitas Pelayanan Akademik terhadap Kepuasan Mahasiswa UNIK Cipasung',
                'Analisis Potensi Ekonomi Kreatif Berbasis Kearifan Lokal di Kabupaten Tasikmalaya',
                'Implementasi Pembelajaran Kontekstual dalam Meningkatkan Pemahaman Fiqh Kontemporer',
                'Studi Kelayakan Pendirian Lembaga Keuangan Mikro Syariah di Lingkungan Pesantren',
                'Analisis Kompetensi Profesional Guru PAI Lulusan UNIK Cipasung di Lapangan',
                'Pengembangan Program Mentoring Akademik untuk Peningkatan Prestasi Mahasiswa Baru',
                'Kajian Epistemologi Keilmuan Islam dalam Merespons Tantangan Modernitas',
                'Model Pengelolaan Sampah Terpadu Berbasis Pesantren di Kabupaten Tasikmalaya',
                'Analisis Resiliensi Ekonomi UMKM Pesantren dalam Menghadapi Krisis Ekonomi Global',
                'Pengembangan Aplikasi Mobile untuk Pembelajaran Tajwid Al-Quran Berbasis Gamifikasi',
                'Kajian Sosiologis tentang Integrasi Alumni Pesantren dalam Pembangunan Masyarakat',
                'Analisis Pengaruh Program Beasiswa terhadap Motivasi Belajar dan Prestasi Akademik',
                'Implementasi Manajemen Mutu ISO 9001:2015 di Perguruan Tinggi Islam Jawa Barat',
                'Pengembangan Bank Soal Berbasis Komputer untuk Evaluasi Pembelajaran di UNIK',
                'Studi Komparatif Sistem Pendidikan Pesantren Indonesia dan Malaysia',
                'Analisis Kebutuhan dan Pengembangan Kurikulum Prodi Manajemen Pendidikan Islam UNIK',
            ];
            $schemes = ['Penelitian Dosen Pemula', 'Penelitian Pengembangan', 'Penelitian Terapan', 'Lainnya'];
            $statuses = ['completed', 'completed', 'completed', 'ongoing'];
            foreach ($titles as $i => $title) {
                $r = $researchers[$i % count($researchers)];
                Research::create([
                    'nidn'       => $r['nidn'],
                    'researcher' => $r['name'],
                    'title'      => $title,
                    'year'       => 2021 + ($i % 4),
                    'scheme'     => $schemes[$i % count($schemes)],
                    'type'       => 'internal',
                    'status'     => $statuses[$i % count($statuses)],
                    'abstract'   => 'Penelitian ini bertujuan untuk mengkaji dan mengembangkan ' . strtolower(substr($title, 0, 60)) . '. Metode yang digunakan adalah penelitian kualitatif deskriptif dengan pendekatan studi kasus.',
                    'amount'     => (8 + ($i % 8)) * 5000000,
                ]);
            }
        }

        // ── 11. PPM (30 data) ─────────────────────────────────────────
        if (Ppm::count() === 0) {
            $executors = [
                ['name' => 'Dr. H. Ahmad Fauzi, M.Pd.', 'nidn' => '0412078501'],
                ['name' => 'Dr. Hj. Siti Fatimah, M.Si.', 'nidn' => '0521079201'],
                ['name' => 'Dr. Deden Nurbayani, M.Pd.', 'nidn' => '0315088803'],
                ['name' => 'Drs. H. Wahyu Hidayat, M.Pd.I.', 'nidn' => '0628087502'],
                ['name' => 'Dr. Rina Mardiana, M.Si.', 'nidn' => '0714089401'],
                ['name' => 'Dr. Asep Mulyana, M.Pd.', 'nidn' => '0912078601'],
            ];
            $ppmTitles = [
                'Pelatihan Literasi Digital bagi Guru Madrasah Ibtidaiyah di Kecamatan Singaparna',
                'Pemberdayaan Ekonomi Ibu Rumah Tangga melalui Kerajinan Batik Tasikmalaya',
                'Penyuluhan Kesehatan dan PHBS di Desa Ciawi Kecamatan Ciawi Tasikmalaya',
                'Pendampingan Pengelolaan Keuangan BUMDES di Desa Padakembang',
                'Pelatihan Pembuatan Pupuk Organik Berbasis Limbah Pertanian di Desa Sukamantri',
                'Program Bimbingan Belajar Gratis bagi Anak Kurang Mampu di Kel. Cihideung',
                'Pendampingan UMKM Makanan Halal dalam Proses Sertifikasi Halal MUI',
                'Sosialisasi Bahaya Pinjaman Online bagi Santri Pondok Pesantren Tasikmalaya',
                'Pelatihan Budidaya Ikan Air Tawar bagi Kelompok Nelayan Situ Gede Tasikmalaya',
                'Program Konseling Kesehatan Mental bagi Remaja Masjid Kecamatan Mangkubumi',
                'Pendampingan Pengurusan Legalitas Usaha bagi UMKM Pesantren Cipasung',
                'Pelatihan Pembuatan Konten Digital Islami bagi Pemuda Karang Taruna',
                'Penyuluhan Pencegahan Pernikahan Dini di Kalangan Remaja Tasikmalaya',
                'Program Pengembangan Perpustakaan Desa di Desa Tanjungjaya Kec. Cisayong',
                'Pemberdayaan Petani Kopi Gunung Galunggung melalui Teknologi Pasca Panen',
                'Pelatihan Tata Kelola Keuangan Masjid untuk DKM se-Kecamatan Singaparna',
                'Program Edukasi Sampah dan Lingkungan Hidup di SDN Cipasung 1 dan 2',
                'Pendampingan Penyusunan RPJMDes bagi Aparatur Desa di Kecamatan Leuwisari',
                'Pelatihan Keterampilan Menjahit bagi Wanita Tani Desa Karangresik',
                'Sosialisasi Pengelolaan Zakat, Infak, dan Sedekah Produktif di Pesantren',
                'Program Peningkatan Kemampuan Baca Tulis Al-Quran bagi Lansia',
                'Pendampingan Pengembangan Agrowisata Berbasis Komunitas di Leuwiliang',
                'Pelatihan Pembuatan Sabun dan Kosmetik Halal bagi Kelompok PKK Tasikmalaya',
                'Pendampingan Pendirian Koperasi Syariah di Lingkungan Pondok Pesantren',
                'Program Vaksinasi dan Penyuluhan Gizi bagi Balita di Posyandu Ciawi',
                'Pelatihan Digital Marketing bagi Pengrajin Mendong Tasikmalaya',
                'Pembinaan Karakter Siswa Madrasah melalui Program Mentoring Islami',
                'Pendampingan Budidaya Tanaman Herbal Islami di Desa Cipasung',
                'Pelatihan Pengelolaan Sampah Plastik menjadi Produk Bernilai Ekonomis',
                'Program Edukasi Antikorupsi bagi Aparatur Desa di Wilayah Tasikmalaya',
            ];
            $locations = [
                'Desa Ciawi, Kec. Ciawi, Kab. Tasikmalaya',
                'Desa Padakembang, Kec. Padakembang, Kab. Tasikmalaya',
                'Kel. Cihideung, Kec. Cihideung, Kota Tasikmalaya',
                'Desa Sukamantri, Kec. Cisayong, Kab. Tasikmalaya',
                'Kec. Singaparna, Kab. Tasikmalaya',
                'Kec. Mangkubumi, Kota Tasikmalaya',
                'Desa Tanjungjaya, Kec. Cisayong, Kab. Tasikmalaya',
                'Desa Karangresik, Kec. Cisayong, Kab. Tasikmalaya',
                'Kec. Leuwisari, Kab. Tasikmalaya',
                'Pondok Pesantren Cipasung, Singaparna',
            ];
            $ppmSchemes = ['Ibp', 'ITGbM', 'PPM Mandiri', 'PPM Kolaborasi Pesantren', 'InPDikti', 'Lainnya'];
            foreach ($ppmTitles as $i => $title) {
                $e = $executors[$i % count($executors)];
                Ppm::create([
                    'nidn'        => $e['nidn'],
                    'executor'    => $e['name'],
                    'title'       => $title,
                    'year'        => 2021 + ($i % 4),
                    'scheme'      => $ppmSchemes[$i % count($ppmSchemes)],
                    'location'    => $locations[$i % count($locations)],
                    'description' => 'Kegiatan pengabdian kepada masyarakat ini dilaksanakan dalam rangka meningkatkan kapasitas dan kesejahteraan masyarakat sasaran melalui pendekatan partisipatif dan pemberdayaan berbasis nilai-nilai Islam.',
                    'status'      => $i < 24 ? 'completed' : 'ongoing',
                ]);
            }
        }

        // ── 12. RENSTRA ───────────────────────────────────────────────
        if (Restra::count() === 0) {
            Restra::create([
                'title'       => 'Rencana Strategis LPPM UNIK Cipasung 2024–2028',
                'start_year'  => 2024,
                'end_year'    => 2028,
                'description' => 'Renstra LPPM UNIK Cipasung 2024–2028 merupakan dokumen perencanaan jangka menengah yang menjadi acuan pelaksanaan penelitian dan pengabdian masyarakat. Renstra ini memuat visi, misi, tujuan, sasaran strategis, program, dan indikator kinerja LPPM selama lima tahun ke depan. Target utama: meningkatkan jumlah publikasi internasional bereputasi, meraih klaster Mandiri, dan memperluas dampak pengabdian masyarakat.',
                'document'    => 'dokumen/renstra-lppm-2024-2028.pdf',
            ]);
            Restra::create([
                'title'       => 'Rencana Strategis LPPM UNIK Cipasung 2019–2023',
                'start_year'  => 2019,
                'end_year'    => 2023,
                'description' => 'Dokumen Renstra LPPM periode 2019–2023 yang telah selesai dilaksanakan. Selama periode ini, LPPM berhasil meningkatkan perolehan hibah penelitian dari Rp 500 juta menjadi Rp 1,2 miliar per tahun dan meningkatkan jumlah program pengabdian masyarakat dari 15 menjadi 30 kegiatan per tahun.',
                'document'    => 'dokumen/renstra-lppm-2019-2023.pdf',
            ]);
        }

        // ── 13. KINERJA ───────────────────────────────────────────────
        if (Performance::count() === 0) {
            Performance::create([
                'year'        => 2024,
                'title'       => 'Laporan Kinerja LPPM UNIK Cipasung Tahun 2024',
                'description' => 'Laporan kinerja LPPM UNIK Cipasung tahun 2024 mencakup capaian penelitian, pengabdian masyarakat, publikasi ilmiah, dan kerjasama institusional. Tahun 2024 LPPM berhasil mencapai target klaster Utama dalam pemeringkatan Kemendikbudristek.',
                'metrics'     => [
                    ['label' => 'Jumlah Penelitian Internal', 'value' => '45 judul', 'icon' => 'bi-journal-text'],
                    ['label' => 'Jumlah PKM', 'value' => '30 kegiatan', 'icon' => 'bi-people'],
                    ['label' => 'Publikasi Jurnal Nasional', 'value' => '38 artikel', 'icon' => 'bi-file-earmark-text'],
                    ['label' => 'Publikasi Jurnal Internasional', 'value' => '8 artikel', 'icon' => 'bi-globe'],
                    ['label' => 'Hibah Eksternal', 'value' => 'Rp 285 juta', 'icon' => 'bi-cash-stack'],
                    ['label' => 'Kerjasama Aktif', 'value' => '10 MoU', 'icon' => 'bi-building-check'],
                ],
            ]);
            Performance::create([
                'year'        => 2023,
                'title'       => 'Laporan Kinerja LPPM UNIK Cipasung Tahun 2023',
                'description' => 'Laporan kinerja LPPM UNIK Cipasung tahun 2023 yang mencakup capaian seluruh program penelitian dan pengabdian masyarakat serta penguatan kerjasama institusional.',
                'metrics'     => [
                    ['label' => 'Jumlah Penelitian Internal', 'value' => '38 judul', 'icon' => 'bi-journal-text'],
                    ['label' => 'Jumlah PKM', 'value' => '25 kegiatan', 'icon' => 'bi-people'],
                    ['label' => 'Publikasi Jurnal Nasional', 'value' => '30 artikel', 'icon' => 'bi-file-earmark-text'],
                    ['label' => 'Publikasi Jurnal Internasional', 'value' => '5 artikel', 'icon' => 'bi-globe'],
                    ['label' => 'Hibah Eksternal', 'value' => 'Rp 220 juta', 'icon' => 'bi-cash-stack'],
                    ['label' => 'Kerjasama Aktif', 'value' => '7 MoU', 'icon' => 'bi-building-check'],
                ],
            ]);
        }

        // ── 14. KERJASAMA (10 data) ───────────────────────────────────
        if (Cooperation::count() === 0) {
            $cooperations = [
                ['partner_name' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'cooperation_type' => 'MoU', 'description' => 'Kerjasama di bidang penelitian bersama, pengabdian masyarakat, dan pengembangan sumber daya manusia antara UNIK Cipasung dan UIN SGD Bandung.', 'start_date' => '2022-03-15', 'end_date' => '2027-03-15', 'status' => 'active'],
                ['partner_name' => 'Institut Pertanian Bogor (IPB University)', 'cooperation_type' => 'MoU', 'description' => 'Kerjasama penelitian di bidang pertanian organik berbasis pesantren, pengembangan pangan halal, dan program pelatihan bagi petani Priangan Timur.', 'start_date' => '2023-06-12', 'end_date' => '2028-06-12', 'status' => 'active'],
                ['partner_name' => 'Universitas Islam Bandung (UNISBA)', 'cooperation_type' => 'MoA', 'description' => 'Kerjasama implementasi joint research, seminar bersama, dan pertukaran dosen-mahasiswa antara UNIK Cipasung dan UNISBA.', 'start_date' => '2023-08-20', 'end_date' => '2026-08-20', 'status' => 'active'],
                ['partner_name' => 'Badan Riset dan Inovasi Nasional (BRIN)', 'cooperation_type' => 'MoU', 'description' => 'Kerjasama pemanfaatan fasilitas riset, pendampingan peneliti muda, dan program magang penelitian di lembaga riset nasional.', 'start_date' => '2023-01-10', 'end_date' => '2028-01-10', 'status' => 'active'],
                ['partner_name' => 'Pemerintah Kabupaten Tasikmalaya', 'cooperation_type' => 'MoU', 'description' => 'Kerjasama penelitian dan pengabdian masyarakat untuk mendukung pembangunan daerah Kabupaten Tasikmalaya, khususnya di bidang pendidikan dan ekonomi.', 'start_date' => '2021-05-17', 'end_date' => '2026-05-17', 'status' => 'active'],
                ['partner_name' => 'Dewan Riset Daerah (DRD) Provinsi Jawa Barat', 'cooperation_type' => 'MoA', 'description' => 'Kerjasama riset dan inovasi daerah untuk mendukung program pembangunan Jawa Barat berbasis riset ilmiah perguruan tinggi.', 'start_date' => '2022-09-05', 'end_date' => '2025-09-05', 'status' => 'active'],
                ['partner_name' => 'Universiti Kebangsaan Malaysia (UKM)', 'cooperation_type' => 'MoU', 'description' => 'Kerjasama internasional penelitian dan pertukaran akademik antara UNIK Cipasung dan UKM Malaysia di bidang pendidikan Islam dan sosial kemasyarakatan.', 'start_date' => '2023-11-30', 'end_date' => '2028-11-30', 'status' => 'active'],
                ['partner_name' => 'Lembaga Ilmu Pengetahuan Indonesia (LIPI)', 'cooperation_type' => 'PKS', 'description' => 'Kerjasama pemanfaatan koleksi jurnal dan database penelitian, pendampingan riset, dan program magang peneliti untuk dosen UNIK Cipasung.', 'start_date' => '2020-04-01', 'end_date' => '2023-04-01', 'status' => 'expired'],
                ['partner_name' => 'PT. Bank Syariah Indonesia (BSI) Cabang Tasikmalaya', 'cooperation_type' => 'MoU', 'description' => 'Kerjasama pemberian beasiswa penelitian, pembiayaan kegiatan PKM, dan pengembangan literasi keuangan syariah di lingkungan UNIK Cipasung.', 'start_date' => '2023-02-14', 'end_date' => '2026-02-14', 'status' => 'active'],
                ['partner_name' => 'Pondok Pesantren Darussalam Ciamis', 'cooperation_type' => 'MoA', 'description' => 'Kerjasama program pengabdian masyarakat, pertukaran keilmuan, dan pengembangan kurikulum pendidikan berbasis pesantren antara UNIK Cipasung dan PP Darussalam.', 'start_date' => '2022-07-22', 'end_date' => '2027-07-22', 'status' => 'active'],
            ];
            foreach ($cooperations as $c) {
                Cooperation::create($c);
            }
        }

        // ── 15. PUSAT STUDI ────────────────────────────────────────────
        if (StudyCenter::count() === 0) {
            StudyCenter::create([
                'name'        => 'Pusat Studi Gender dan Anak',
                'slug'        => 'pusat-studi-gender-dan-anak',
                'short_name'  => 'PSGA',
                'description' => 'Pusat Studi Gender dan Anak (PSGA) UNIK Cipasung merupakan lembaga kajian yang berfokus pada isu-isu kesetaraan gender, perlindungan anak, dan pemberdayaan perempuan dalam perspektif Islam.',
                'content'     => '<p>Pusat Studi Gender dan Anak (PSGA) Universitas Islam KH. Ruhiyat Cipasung adalah lembaga kajian akademis yang didirikan dengan misi mulia untuk mengkaji, meneliti, dan mengadvokasi isu-isu kesetaraan gender serta perlindungan dan pemberdayaan anak dalam bingkai nilai-nilai Islam yang rahmatan lil-alamin.</p><p>PSGA hadir sebagai respons atas tantangan sosial yang dihadapi masyarakat, khususnya di pedesaan dan lingkungan pesantren: kekerasan dalam rumah tangga, pernikahan anak usia dini, kesenjangan akses pendidikan berbasis gender, serta minimnya perlindungan hukum bagi perempuan dan anak. Dengan pendekatan akademis yang berbasis riset dan nilai-nilai keislaman yang komprehensif, PSGA berkomitmen menjadi pusat referensi dan solusi atas persoalan tersebut.</p>',
                'head_name'   => 'Dr. Hj. Siti Fatimah, M.Si.',
                'email'       => 'psga@unik.ac.id',
                'phone'       => '0813-5678-9013',
                'vision'      => 'Menjadi pusat kajian gender dan anak terdepan di Indonesia yang mengintegrasikan perspektif Islam, ilmu sosial, dan hukum dalam pemberdayaan perempuan dan perlindungan anak.',
                'mission'     => '<ol><li>Melaksanakan penelitian mendalam dan berbasis bukti tentang isu gender dan anak dalam perspektif Islam.</li><li>Menyelenggarakan program pemberdayaan perempuan dan perlindungan anak di masyarakat, khususnya di lingkungan pesantren.</li><li>Membangun kemitraan strategis dengan pemerintah, LSM, dan lembaga internasional dalam advokasi kebijakan gender dan perlindungan anak.</li><li>Mendiseminasikan hasil riset melalui publikasi ilmiah, seminar, dan forum kebijakan.</li></ol>',
                'programs'    => '<ul><li>Penelitian tentang pencegahan pernikahan anak usia dini</li><li>Pendampingan korban kekerasan dalam rumah tangga (KDRT)</li><li>Program pelatihan kesetaraan gender bagi guru madrasah</li><li>Advokasi kebijakan perlindungan anak di daerah</li><li>Klinik konsultasi hukum keluarga berbasis nilai Islam</li><li>Penerbitan jurnal kajian gender dan anak</li></ul>',
                'is_active'   => true,
                'order'       => 1,
            ]);
        }

        $this->command->info('Demo data seeded successfully!');
    }
}
