{!! $newsletter->html_content !!}

<blockquote class="blockquote text-center">
    Si vous ne souhaitez plus recevoir cette newsletter, <a href="{{route('beforeOptout', ['user' => $user->id])}}">cliquez
        ici</a>
    <p class="mb-0" style="font-size:0.6rem">
        Vous recevez cet email car vous êtes inscrit à Revv.
        Conformément à la loi informatique, vous disposez d'un droit d'accès, de
        rectification et d'opposition aux données vous concernant.
    </p>

    <footer class="blockquote-footer">{{ date('Y') }} {{ config('app.name') }}. All rights reserved.</footer>
</blockquote>