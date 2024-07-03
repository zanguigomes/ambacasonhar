<header class="last-posts-list" style="margin-top: 0">
    <h2>+ Informações do Projecto</h2>
</header>
<ul>
    <li>
        Área:<br>
        <i class="fa-regular fa-circle-right"></i> <a href="">{{ $single->area }}</a>
    </li>
    <li>
        Coordenação:<br>
        <i class="fa-regular fa-circle-right"></i> <a href="">{{ $single->coordination }}</a>
    </li>
    <li>
        Data de iníco:<br>
        <i class="fa-regular fa-circle-right"></i> <a href="">{{ date('d/m/Y', strtotime($single->date_start)) }}</a>
    </li>
    <li>
        Data de término<br>
        <i class="fa-regular fa-circle-right"></i> <a href="">{{ date('d/m/Y', strtotime($single->date_end)) }}</a>
    </li>
    <li>
        Estado:<br>
        <i class="fa-regular fa-circle-right"></i> <a href="">Projecto {{ $single->status }}</a>
    </li>
</ul>
<br><br>
