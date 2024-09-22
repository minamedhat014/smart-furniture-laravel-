<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 5px auto;
            text-align: center;
        }
        iframe {
            width: 100%;
            height: 600px;
            border: none;
        }
      
    </style>
</head>
<body>

<div class="container">
    <!-- PDF Preview Section -->
    @foreach($policy->getMedia('companyPolicy') as $key => $pdf)
    <iframe id="pdfFrame" src="{{$pdf->getUrl()}}" frameborder="0"></iframe>
    @endforeach
   
</div>

</body>
</html>
