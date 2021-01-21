<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exception Generator</title>

    <!-- Bootstrap - Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Bootstrap - Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body style="padding: 15px">
<div class="row">
    <div class="col-xs-4">
        <form method="post"
              action="/your-awesome-project/post-request"
        >
            @csrf
            <input name="input" type="hidden" value="{{$faker->name}}">
            <button class="btn btn-primary" type="submit">Generate POST "/your-awesome-project/post-request" Exception</button>
        </form>
        <br />
        <br />
        <br />
        <button id="generate-get-exceptions" class="btn btn-primary" type="submit">Generate (10-50) GET "/your-awesome-project/get/{slug}" Exception</button>
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- Bootstrap - Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    const randomSlugs = [
        @for($i = 0; $i < 60; $i++)
        "{{$faker->slug}}",
        @endfor
    ]
    var getRequestTimeout = null;
    var getRequestCurrent = null;
    var getRequestTotal = null;

    function generateGetRequestException() {
        $('#generate-get-exceptions').text("Generating " + getRequestCurrent + "/" + getRequestTotal + " exceptions")
        $.ajax('/your-awesome-project/get/' + randomSlugs[getRequestCurrent])
        getRequestCurrent++
        if (getRequestCurrent < getRequestTotal) {
            getRequestTimeout = setTimeout(generateGetRequestException, Math.round((Math.random() * 100000) % 2000) + 1000)
        } else {
            $('#generate-get-exceptions').data('generating', false).text('Generate (10-50) GET "/your-awesome-project/get/{slug}" Exception')
        }
    }

    $(document).ready(function () {
        $('#generate-get-exceptions').click(function() {
            const sender = $(this)
            if (sender.data('generating')) {
                return
            }
            sender.data('generating', true)
            const total = 10 + Math.round((Math.random() * 100000) % 40)
            getRequestCurrent = 1
            getRequestTotal = total
            generateGetRequestException()
        })
    })
</script>
</body>
</html>
