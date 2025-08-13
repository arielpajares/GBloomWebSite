<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tarjetas de Productos — HTML y CSS</title>
  <style>
    :root{
      --bg: #f6f7fb;
      --card: #ffffff;
      --muted: #6b7280;
      --accent: #1f6feb;
      --success: #16a34a;
      --danger: #ef4444;
      --shadow: 0 6px 20px rgba(16,24,40,0.08);
      --radius: 12px;
      --max-width: 1100px;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family: Inter, sans-serif;
      background:var(--bg);
      color:#0f172a;
      padding:32px 20px;
      display:flex;
      justify-content:center;
    }
    .wrapper{width:100%;max-width:var(--max-width)}
    .grid{
      display:grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap:18px;
    }
    .card{
      background:var(--card);
      border-radius:var(--radius);
      box-shadow:var(--shadow);
      overflow:hidden;
      display:flex;
      flex-direction:column;
      transition:transform .18s ease, box-shadow .18s ease;
      border:1px solid rgba(15,23,42,0.04);
    }
    .card:hover{transform:translateY(-6px); box-shadow:0 12px 30px rgba(16,24,40,0.12)}
    .body{padding:14px 16px 18px;display:flex;flex-direction:column;gap:8px}
    .title-row{display:flex;align-items:center;justify-content:space-between;gap:10px}
    .title{font-weight:600;font-size:1rem}
    .brand{font-size:.86rem;color:var(--muted)}
    .price{font-weight:700;font-size:1.04rem;color:var(--accent)}
    .meta{display:flex;align-items:center;justify-content:space-between;gap:10px}
    .stock-badge{
      padding:6px 10px;border-radius:999px;font-weight:600;font-size:.85rem;
      background:rgba(6,95,70,0.06);color:var(--success);border:1px solid rgba(6,95,70,0.08);
    }
    .card.low-stock{
      border-color: rgba(239,68,68,0.14);
      box-shadow: 0 12px 30px rgba(239,68,68,0.06);
    }
    .card.low-stock .stock-badge{
      background: rgba(239,68,68,0.06); color:var(--danger); border:1px solid rgba(239,68,68,0.12);
    }
    .actions{display:flex;gap:8px;margin-top:6px}
    .btn{
      padding:8px 12px;border-radius:8px;font-weight:600;cursor:pointer;
      background:var(--accent);color:white;font-size:.9rem;text-align:center;flex:1
    }
    .btn.secondary{background:transparent;color:var(--accent);border:1px solid rgba(31,111,235,0.08)}
    .muted{color:var(--muted);font-size:.88rem}
    .small{font-size:.82rem}
  </style>
</head>
<body>
  <?php
  include "catalogo.php";
  ?>
</body>
</html>
