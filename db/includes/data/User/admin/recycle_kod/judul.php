<?php

// Fungsi utilitas
function formatTopicForFile($topic) {
    return strtolower(preg_replace('/\s+/', '-', trim($topic)));
}

function formatTopicForDisplay($topic) {
    return ucwords(strtolower(preg_replace('/[-_]/', ' ', $topic)));
}




// Daftar judul dan deskripsi khusus untuk tema yang ada di domain https://jlk.fib.unand.ac.id/
$entries = [
    'Gacor55'   => [
        'title' => 'Gacor55: Analisis Pragmatik dalam Konteks Sosial Budaya',
        'description' => 'Gacor55 menyajikan kajian pragmatik mengenai penggunaan bahasa dalam interaksi sosial, mengungkap bagaimana makna ditafsirkan dalam konteks budaya masyarakat Indonesia.'
    ],
    'Gacor668'  => [
        'title' => 'Gacor668: Kajian Semiotika terhadap Teks Media Sosial Indonesia',
        'description' => 'Gacor668 mengeksplorasi tanda dan makna dalam komunikasi digital, khususnya melalui pendekatan semiotika pada konten media sosial yang merepresentasikan nilai budaya lokal.'
    ],
    'Olx77'     => [
        'title' => 'Olx77: Representasi Gender dalam Sastra Modern Indonesia',
        'description' => 'Olx77 mengkaji bagaimana representasi gender dibangun dalam karya sastra Indonesia modern serta pengaruhnya terhadap konstruksi sosial dan budaya.'
    ],
    'Olx128'    => [
        'title' => 'Olx128: Analisis Wacana Kritis pada Pidato Politik Indonesia',
        'description' => 'Olx128 menghadirkan studi analisis wacana kritis terhadap pidato-pidato politik yang berdampak dalam dinamika budaya dan kebangsaan di Indonesia.'
    ],
    'Dewa85'    => [
        'title' => 'Dewa85: Dinamika Perkembangan Bahasa Daerah dalam Era Globalisasi',
        'description' => 'Dewa85 mengeksplorasi keberlangsungan bahasa daerah di Indonesia dalam menghadapi dominasi bahasa global melalui studi linguistik terapan dan pelestarian budaya.'
    ],
    'Gacor168'  => [
        'title' => 'Gacor168: Metafora Budaya dalam Lirik Lagu Populer Indonesia',
        'description' => 'Gacor168 menganalisis metafora dan simbolisme budaya dalam lirik lagu Indonesia sebagai bentuk ekspresi sastra populer kontemporer.'
    ],
    'Slot38'    => [
        'title' => 'Slot38: Stilistika Puisi dan Nilai Budaya dalam Sastra Indonesia',
        'description' => 'Slot38 membahas penggunaan gaya bahasa dalam puisi dan bagaimana unsur kebudayaan Indonesia tercermin melalui karya sastra tersebut.'
    ],
    'Toto7000'  => [
        'title' => 'Toto7000: Analisis Sosiolinguistik pada Dialek Lokal',
        'description' => 'Toto7000 menyelidiki hubungan antara variasi bahasa dengan faktor sosial seperti kelas, usia, dan wilayah dalam masyarakat Indonesia.'
    ],
    'Toto19'    => [
        'title' => 'Toto19: Bahasa dan Identitas dalam Kajian Etnolinguistik',
        'description' => 'Toto19 mengangkat pentingnya bahasa dalam membentuk identitas etnis dan budaya melalui pendekatan etnolinguistik.'
    ],
    'Toto33'    => [
        'title' => 'Toto33: Pengaruh Bahasa Asing dalam Struktur Bahasa Indonesia',
        'description' => 'Toto33 mengulas dampak serapan bahasa asing terhadap tata bahasa dan kosakata bahasa Indonesia kontemporer.'
    ],
    'Toto1000'  => [
        'title' => 'Toto1000: Literasi Digital dan Bahasa Generasi Muda',
        'description' => 'Toto1000 menyoroti perubahan bahasa dan gaya komunikasi generasi muda Indonesia dalam era digital melalui platform daring.'
    ],
    'Toto100'   => [
        'title' => 'Toto100: Sastra Lisan dan Pelestarian Budaya Nusantara',
        'description' => 'Toto100 memfokuskan pada upaya pelestarian sastra lisan Indonesia sebagai warisan budaya tak benda melalui dokumentasi dan analisis naratif.'
    ],
    'Toto68'    => [
        'title' => 'Toto68: Fonologi Bahasa Indonesia dan Implikasinya dalam Pengajaran',
        'description' => 'Toto68 menyajikan studi fonologi dan penerapannya dalam pengajaran bahasa Indonesia sebagai bahasa ibu maupun asing.'
    ],
    'Toto21'    => [
        'title' => 'Toto21: Kajian Linguistik Forensik di Indonesia',
        'description' => 'Toto21 mengulas penggunaan analisis linguistik dalam konteks hukum dan penyelidikan, menyoroti studi kasus dari Indonesia.'
    ],
    'Toto38'    => [
        'title' => 'Toto38: Bahasa, Media, dan Kekuasaan dalam Perspektif Kritis',
        'description' => 'Toto38 memeriksa hubungan antara bahasa, media, dan kekuasaan dalam membentuk opini publik dan wacana dominan di masyarakat.'
    ],
    'Olx168'    => [
        'title' => 'Olx168: Pendidikan Bahasa Berbasis Multikultural di Indonesia',
        'description' => 'Olx168 memaparkan strategi pendidikan bahasa yang responsif terhadap keberagaman budaya dan etnis di Indonesia.'
    ],
    'Togel99'   => [
        'title' => 'Togel99: Kajian Gender dalam Teks dan Budaya Populer',
        'description' => 'Togel99 membedah representasi gender dalam media populer, sastra, dan budaya kontemporer Indonesia.'
    ]
];



// Tulis setiap entry ke file
if (!file_exists('data')) {
    mkdir('data', 0777, true);
}

foreach ($entries as $key => $value) {
    $fileName = 'data/' . formatTopicForFile($key) . '.txt';
    $content = "Title: {$value['title']}\nDescription: {$value['description']}\n";
    file_put_contents($fileName, $content);
    echo "Generated: $fileName<br>\n";
}
?>
