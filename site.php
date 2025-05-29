<?php
$listFile = 'lulus.txt'; 
$listContent = file_get_contents($listFile);

if ($listContent === false) {
    header('Content-Type: text/plain; charset=utf-8');
    echo "Gagal mengambil data dari URL.";
    exit;
}


$posts = explode(PHP_EOL, trim($listContent));
$pages = [];

foreach ($posts as $post) {
    $url = 'https://moodle.stikesgrahaedukasi.ac.id/' . trim($post);
    $pages[] = [
        'loc' => $url,
        'lastmod' => date('Y-m-d'),
        'priority' => '1.0' 
    ];
}

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach ($pages as $pro_max): ?>
        <url>
            <loc><?php echo htmlspecialchars($pro_max['loc']); ?></loc>
            <lastmod><?php echo htmlspecialchars($pro_max['lastmod']); ?></lastmod>
            <priority><?php echo htmlspecialchars($pro_max['priority']); ?></priority>
        </url>
    <?php endforeach; ?>
</urlset>
