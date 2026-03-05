<?php
$themeConfigFile = __DIR__ . '/theme-config.json';
$availableThemes = [
    'default' => 'Default',
    'songkran' => 'Songkran Festival',
];

if (!file_exists($themeConfigFile)) {
    file_put_contents($themeConfigFile, json_encode(['active_theme' => 'default'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

$config = json_decode(file_get_contents($themeConfigFile), true);
$activeTheme = $config['active_theme'] ?? 'default';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newTheme = $_POST['active_theme'] ?? 'default';

    if (!array_key_exists($newTheme, $availableThemes)) {
        $message = 'ธีมไม่ถูกต้อง';
    } else {
        $activeTheme = $newTheme;
        file_put_contents(
            $themeConfigFile,
            json_encode(['active_theme' => $activeTheme], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );
        $message = 'บันทึกธีมเรียบร้อยแล้ว';
    }
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Theme Settings</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f8fafc; padding:24px; }
        .card { max-width:560px; margin:0 auto; background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:20px; }
        .row { margin-bottom:14px; }
        select, button { width:100%; padding:10px; font-size:16px; }
        .msg { padding:10px; border-radius:8px; margin-bottom:12px; background:#ecfeff; color:#155e75; }
        a { color:#0369a1; }
    </style>
</head>
<body>
    <div class="card">
        <h1>ตั้งค่าธีมเว็บไซต์</h1>
        <p>หน้าแอดมินนี้ใช้สำหรับสลับธีมหลักของเว็บ (ตัวอย่าง PHP + CSS + JS)</p>

        <?php if ($message): ?>
            <div class="msg"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="row">
                <label for="active_theme">เลือกธีม</label>
                <select name="active_theme" id="active_theme">
                    <?php foreach ($availableThemes as $key => $label): ?>
                        <option value="<?php echo htmlspecialchars($key); ?>" <?php echo $activeTheme === $key ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($label); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit">บันทึก</button>
        </form>

        <p style="margin-top:16px;">ดูหน้าใช้งานจริง: <a href="dashboard.php">dashboard.php</a></p>
    </div>
</body>
</html>
