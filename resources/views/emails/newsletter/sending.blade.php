{!! $newsletter->html_content !!}
<p class="text-center" style="max-width: 700px; font-size:0.7rem">
    Vous recevez cet email car vous êtes inscrit à Revv.
    Conformément à la loi informatique, vous disposez d'un droit d'accès, de
    rectification et d'opposition aux données vous concernant.
</p>

<p>Si vous ne souhaitez plus recevoir cette newsletter, <a href="{{route('outnewsletter', ['user' => $user->id])}}">cliquez
        ici</a></p>
