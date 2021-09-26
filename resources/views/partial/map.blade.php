{{-- Leaflet用のCSSとJavaScriptを読み込み --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>

{{-- <script>
    // 地図描画エリアを作成
    const map = L.map('map');

    // 中心座標とzoomを指定
    // map.setView([35.658584, 139.7454316], 10);
    map.setView([{{ $latitude }}, {{ $longitude }}], {{ $zoom }});

    // 表示するタイルを指定
    L.tileLayer('http://tile.openstreetmap.jp/{z}/{x}/{y}.png').addTo(map);
</script> --}}
<script>
    //地図描画 オプションでzoomControlをfalseにするとzoomControlを消せる(下記で別な場所に表示)
    var map = L.map('map');

    // 中心とzoomを指定
    map.setView([{{ $latitude }}, {{ $longitude }}], {{ $zoom }});

    // スケール表示 (imperial: falseにしないとmile表示も出る)
    L.control.scale({
        maxWidth: 200,
        position: 'bottomright',
        imperial: false
    }).addTo(map);

    var baseMaps = {
        "地理院地図": L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
            attribution: "<a href='https://maps.gsi.go.jp/development/ichiran.html' target='_blank'>地理院タイル</a>"
        }),
        "淡色地図": L.tileLayer('http://cyberjapandata.gsi.go.jp/xyz/pale/{z}/{x}/{y}.png', {
            attribution: "<a href='http://portal.cyberjapan.jp/help/termsofuse.html' target='_blank'>地理院タイル</a>"
        }),
        "オープンストリートマップ": L.tileLayer('http://tile.openstreetmap.jp/{z}/{x}/{y}.png', {
            attribution: "<a href='http://osm.org/copyright' target='_blank'>OpenStreetMap</a> contributors"
        }),
        "衛生写真": L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/seamlessphoto/{z}/{x}/{y}.jpg', {
            attribution: "<a href='https://maps.gsi.go.jp/development/ichiran.html' target='_blank'>地理院タイル</a>"
        }),
    };

    //layersコントロールにbaseMapsオブジェクトを設定して地図に追加
    //コントロール内にプロパティ名が表示される
    L.control.layers(baseMaps).addTo(map);

    //最初に表示するタイルを指定
    baseMaps['オープンストリートマップ'].addTo(map);
</script>
