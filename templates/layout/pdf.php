<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Orçamento PDF</title>
    <style>
        @page {
            size: A4;
            margin: 6mm 10mm;
        }
        @media print {
            @page {
                margin: 6mm;
            }
            body {
                margin: 0;
                padding: 0 15mm;
            }
            table {
                page-break-inside: auto;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            thead {
                display: table-header-group;
            }
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .highlight {
            color: #22C55E;
        }
        .border-highlight {
            border-color: #22C55E;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        .mb-2 { margin-bottom: 8px; }
        .mb-4 { margin-bottom: 16px; }
        .mb-8 { margin-bottom: 32px; }
        .mt-4 { margin-top: 16px; }
        .mt-12 { margin-top: 48px; }
        .pt-6 { padding-top: 24px; }
        .pb-6 { padding-bottom: 24px; }
        .px-3 { padding-left: 12px; padding-right: 12px; }
        .py-2 { padding-top: 8px; padding-bottom: 8px; }
        .border-b-2 { border-bottom: 2px solid; }
        .border-t { border-top: 1px solid #ccc; }
        .bg-gray-100 { background-color: #f5f5f5; }
        .p-4 { padding: 16px; }
        .rounded-lg { border-radius: 8px; }
        .flex { display: flex; }
        .justify-between { justify-content: space-between; }
        .justify-end { justify-content: flex-end; }
        .items-center { align-items: center; }
        .text-4xl { font-size: 36px; }
        .text-2xl { font-size: 24px; }
        .text-lg { font-size: 18px; }
        .text-sm { font-size: 14px; }
        .text-xs { font-size: 12px; }
        .w-20 { width: 80px; }
        .w-24 { width: 96px; }
        table td:nth-child(2) {
            word-wrap: break-word;
            word-break: break-word;
            max-width: 23ch;
            white-space: normal;
        }
    </style>
</head>
<body>
    <?= $this->fetch('content') ?>
</body>
</html>