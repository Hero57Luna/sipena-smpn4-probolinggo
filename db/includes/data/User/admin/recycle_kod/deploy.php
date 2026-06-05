<?php
$hostname = 'https://jlk.fib.unand.ac.id/public';
$dataFolder = 'data/';
$outputFolder = './'; // Folder untuk output HTML
$templateFile = __DIR__ . '/anonymous24.php';

// Membaca file data.txt untuk mendapatkan daftar kata kunci
$filePath = 'data.txt';
$keywords = file($filePath, FILE_IGNORE_NEW_LINES);

// Membuat file sitemap.xml
function createSitemap($outputFolder, $keywords, $hostname, $dataFolder) {
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ($keywords as $keyword) {
        $keyword = sanitizeName(trim($keyword));
        $contentFile = $dataFolder . $keyword . '.txt';

        if (file_exists($contentFile)) {
            $sections = explode("\n\n", file_get_contents($contentFile));

            foreach ($sections as $index => $section) {
                preg_match('/^Title:\s*(.+)$/m', $section, $titleMatches);
                preg_match('/^Description:\s*(.+)$/m', $section, $descMatches);

                if ($titleMatches && $descMatches) {
                    $fileName = $keyword . '.html';
                    $url = $hostname . '/' . $fileName;

                    $sitemap .= "  <url>\n";
                    $sitemap .= "    <loc>$url</loc>\n";
                    $sitemap .= "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                    $sitemap .= "    <changefreq>daily</changefreq>\n";
                    $sitemap .= "    <priority>1.0</priority>\n";
                    $sitemap .= "  </url>\n";
                }
            }
        }
    }

    $sitemap .= '</urlset>';

    file_put_contents($outputFolder . 'sitemap.xml', $sitemap);
    echo "Sitemap.xml telah dibuat di $outputFolder/sitemap.xml\n";
}

// Membuat file robots.txt
function createRobotsTxt($outputFolder, $hostname) {
    $robots = "User-agent: *\n";
    $robots .= "Disallow:\n";
    $robots .= "Sitemap: $hostname/sitemap.xml\n";

    file_put_contents($outputFolder . 'robots.txt', $robots);
    echo "Robots.txt telah dibuat di $outputFolder/robots.txt\n";
}

// Membersihkan nama folder
function sanitizeName($name) {
    return preg_replace('/[^a-z0-9\-]/', '-', strtolower(trim($name)));
}

function generateRandomParagraph($internalLinks) {
    return "<p>Pengembangan pendidikan melalui teknologi seperti yang diterapkan oleh Brandal di Kabupaten Ciamis dapat meningkatkan keterampilan guru dan tenaga kependidikan. Melalui <a href='$internalLinks'>$internalLinks</a>, pelatihan dan kursus memberikan manfaat nyata bagi pendidikan di daerah.</p>";
}

if (!file_exists($templateFile)) {
    die("Template tidak ditemukan: anonymous24.php");
}
$template = file_get_contents($templateFile);

foreach ($keywords as $keyword) {
    $keyword = sanitizeName(trim($keyword));
    $contentFile = $dataFolder . $keyword . '.txt';

    if (file_exists($contentFile)) {
        $content = file_get_contents($contentFile);
        $sections = explode("\n\n", $content);

        foreach ($sections as $index => $section) {
            preg_match('/^Title:\s*(.+)$/m', $section, $titleMatches);
            preg_match('/^Description:\s*(.+)$/m', $section, $descMatches);

            if ($titleMatches && $descMatches) {
                $title = trim($titleMatches[1]);
                $description = trim($descMatches[1]);

                $formattedTitle = ucwords(strtolower(str_replace('-', ' ', $title)));
                $fileName = $keyword . '.html';
                $filePath = $outputFolder . $fileName;
                $randomParagraph = generateRandomParagraph($keyword);
                $canonical = "$hostname/$fileName";

                $phpContent = str_replace(
                    ['{{brand}}', '{{title}}', '{{description}}', '{{internalLinks}}', '{{canonical}}'],
                    [$keyword, $formattedTitle, $description, $randomParagraph, $canonical],
                    $template
                );

                file_put_contents($filePath, $phpContent);
                echo "File HTML dihasilkan: $filePath\n";
            }
        }
    }
}

createSitemap($outputFolder, $keywords, $hostname, $dataFolder);
createRobotsTxt($outputFolder, $hostname);
