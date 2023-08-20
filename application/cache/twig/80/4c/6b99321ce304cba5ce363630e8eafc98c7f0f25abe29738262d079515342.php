<?php

/* search-results.html */
class __TwigTemplate_804c6b99321ce304cba5ce363630e8eafc98c7f0f25abe29738262d079515342 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-private.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Pencarian -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Pencarian</h3>
    </div>
    <div class=\"module-body\">
        <div class=\"well well-small\" style=\"box-shadow: none;\">
            Hasil pencarian dengan kata kunci : <b>";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["keyword"]) ? $context["keyword"] : null), "html", null, true);
        echo "</b>
        </div>";
        // line 17
        if ((!twig_test_empty($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "siswa")))) {
            // line 18
            echo "        <b><i class=\"icon-group\"></i> Siswa </b>(ditemukan";
            echo twig_escape_filter($this->env, count($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "siswa")), "html", null, true);
            echo " record)
        <table class=\"table table-condensed table-striped\">";
            // line 20
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "siswa"));
            foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                // line 21
                echo "            <tr>
                <td>
                    <img style=\"height:30px;width:30px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
                // line 23
                echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "foto"), "medium", $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin")), "html", null, true);
                echo "\">
                    <b>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
                echo (((!twig_test_empty($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nis")))) ? ((("<span class=\"text-muted\">(" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nis")) . ")</span>")) : (""));
                echo "</b>
                    <br>";
                // line 25
                echo twig_escape_filter($this->env, ((($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id") != 3)) ? (($this->getAttribute($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "kelas_aktif"), "nama") . " , ")) : ("")), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin"), "html", null, true);
                echo " ,";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "agama"), "html", null, true);
                echo "
                </td>
                <td width=\"20%\">
                    <ul class=\"nav nav-pills\" style=\"margin-bottom:0px;\">";
                // line 29
                if (is_admin()) {
                    // line 30
                    echo "                        <li><a class=\"btn btn-default btn-small\" href=\"";
                    echo twig_escape_filter($this->env, site_url(((("siswa/detail/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
                    echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                        <li class=\"dropdown\">
                            <a class=\"btn btn-default btn-small\" href=\"#\" id=\"act-";
                    // line 32
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                    echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-edit\"></i> Edit <b class=\"caret\" style=\"margin-top:5px;\"></b></a>
                            <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"act-";
                    // line 33
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                    echo "\">
                                <li>";
                    // line 34
                    echo anchor(((("siswa/edit_profile/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Profil", array("class" => "siswa-iframe-4", "title" => "Edit Profil Siswa"));
                    echo "</li>
                                <li>";
                    // line 35
                    echo anchor(((("siswa/edit_picture/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Foto", array("class" => "siswa-iframe-5", "title" => "Edit Foto Siswa"));
                    echo "</li>";
                    // line 36
                    if (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id") != 3)) {
                        // line 37
                        echo "                                <li>";
                        echo anchor(((("siswa/moved_class/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Kelas Aktif", array("class" => "siswa-iframe-kelas-aktif", "title" => "Edit Kelas Aktif"));
                        echo "</li>";
                    }
                    // line 39
                    echo "                                <li>";
                    echo anchor(((("siswa/edit_username/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Username", array("class" => "siswa-iframe-2", "title" => "Edit Username Siswa"));
                    echo "</li>
                                <li>";
                    // line 40
                    echo anchor(((("siswa/edit_password/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Password", array("class" => "siswa-iframe-3", "title" => "Edit Password Siswa"));
                    echo "</li>
                            </ul>
                        </li>";
                } else {
                    // line 44
                    echo "                        <li><a class=\"btn btn-default btn-small\" href=\"";
                    echo twig_escape_filter($this->env, site_url(("siswa/detail/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
                    echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>";
                }
                // line 46
                echo "                    </ul>
                </td>
            </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "        </table>
        <br>";
        }
        // line 54
        if ((!twig_test_empty($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pengajar")))) {
            // line 55
            echo "        <b><i class=\"icon-user\"></i> Pengajar </b>(ditemukan";
            echo twig_escape_filter($this->env, count($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pengajar")), "html", null, true);
            echo " record)
        <table class=\"table table-condensed table-striped\">";
            // line 57
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pengajar"));
            foreach ($context['_seq'] as $context["no"] => $context["v"]) {
                // line 58
                echo "            <tr>
                <td>
                    <img style=\"height:30px;width:30px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
                // line 60
                echo twig_escape_filter($this->env, get_url_image_pengajar($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "foto"), "medium", $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin")), "html", null, true);
                echo "\">
                    <b>";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
                echo (((!twig_test_empty($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nip")))) ? ((("<span class=\"text-muted\">(" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nip")) . ")</span>")) : (""));
                echo "</b>";
                // line 62
                $context["is_admin"] = get_row_data("login_model", "retrieve", array(0 => null, 1 => null, 2 => null, 3 => null, 4 => $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "is_admin");
                // line 63
                if (((isset($context["is_admin"]) ? $context["is_admin"] : null) == 1)) {
                    // line 64
                    echo "                        <span class=\"label label-warning\">Administrator</span>";
                }
                // line 66
                echo "                    <br><b>Alamat :</b>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "alamat"), "html", null, true);
                echo "
                </td>
                <td width=\"20%\">
                    <ul class=\"nav nav-pills\" style=\"margin-bottom:0px;\">";
                // line 70
                if ((is_admin() == true)) {
                    // line 71
                    echo "                        <li><a class=\"btn btn-default btn-small\" href=\"";
                    echo twig_escape_filter($this->env, site_url(((("pengajar/detail/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
                    echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                        <li class=\"dropdown\">
                            <a class=\"btn btn-default btn-small\" href=\"#\" id=\"act-";
                    // line 73
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                    echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-edit\"></i> Edit <b class=\"caret\" style=\"margin-top:5px;\"></b></a>
                            <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"act-";
                    // line 74
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                    echo "\">
                                <li>";
                    // line 75
                    echo anchor(((("pengajar/edit_profile/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Profil", array("class" => "pengajar-iframe-4", "title" => "Edit Profil Pengajar"));
                    echo "</li>
                                <li>";
                    // line 76
                    echo anchor(((("pengajar/edit_picture/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Foto", array("class" => "pengajar-iframe-5", "title" => "Edit Foto Pengajar"));
                    echo "</li>
                                <li>";
                    // line 77
                    echo anchor(((("pengajar/edit_username/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Username", array("class" => "pengajar-iframe-2", "title" => "Edit Username Pengajar"));
                    echo "</li>
                                <li>";
                    // line 78
                    echo anchor(((("pengajar/edit_password/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Password", array("class" => "pengajar-iframe-3", "title" => "Edit Password Pengajar"));
                    echo "</li>
                            </ul>
                        </li>";
                } else {
                    // line 82
                    echo "                        <li><a class=\"btn btn-default btn-small\" href=\"";
                    echo twig_escape_filter($this->env, site_url(("pengajar/detail/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
                    echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>";
                }
                // line 84
                echo "                    </ul>
                </td>
            </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "        </table>
        <br>";
        }
        // line 92
        if ((!twig_test_empty($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "materi")))) {
            // line 93
            echo "        <b><i class=\"icon-book\"></i> Materi </b>(ditemukan";
            echo twig_escape_filter($this->env, count($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "materi")), "html", null, true);
            echo " record)
        <table class=\"table table-condensed table-striped\">";
            // line 95
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "materi"));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 96
                if ((is_admin() == true)) {
                    // line 97
                    $context["action_edit"] = true;
                    // line 98
                    $context["action_delete"] = true;
                } elseif ((is_pengajar() == true)) {
                    // line 100
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pengajar_id") == get_sess_data("user", "id"))) {
                        // line 101
                        $context["action_edit"] = true;
                        // line 102
                        $context["action_delete"] = true;
                    } else {
                        // line 104
                        $context["action_edit"] = false;
                        // line 105
                        $context["action_delete"] = false;
                    }
                }
                // line 109
                if (is_siswa()) {
                    // line 110
                    echo "                <tr>
                    <td>
                        <a href=\"";
                    // line 112
                    echo twig_escape_filter($this->env, site_url(("materi/detail/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"))), "html", null, true);
                    echo "\" target=\"_tab\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
                    echo "</a>
                    </td>
                </tr>";
                } else {
                    // line 116
                    echo "                <tr>
                    <td>";
                    // line 118
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
                    echo "
                    </td>
                    <td width=\"20%\">
                        <div class=\"btn-group\">";
                    // line 122
                    if ((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) {
                        // line 123
                        $context["url_type"] = "file";
                    } else {
                        // line 125
                        $context["url_type"] = "tertulis";
                    }
                    // line 127
                    echo anchor(("materi/detail/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-zoom-in\"></i> Detail", array("class" => "btn btn-default btn-small", "target" => "_tab"));
                    // line 129
                    if (((isset($context["action_edit"]) ? $context["action_edit"] : null) == true)) {
                        // line 130
                        echo anchor(((((("materi/edit/" . (isset($context["url_type"]) ? $context["url_type"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(((current_url() . "?q=") . (isset($context["keyword"]) ? $context["keyword"] : null)))), "<i class=\"icon-edit\"></i> Edit", array("class" => "btn btn-default btn-small"));
                    }
                    // line 133
                    if (((isset($context["action_delete"]) ? $context["action_delete"] : null) == true)) {
                        // line 134
                        echo anchor(((("materi/delete/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(((current_url() . "?q=") . (isset($context["keyword"]) ? $context["keyword"] : null)))), "<i class=\"icon-trash\"></i> Hapus", array("class" => "btn btn-default btn-small", "onclick" => "return confirm('Anda yakin ingin menghapus?')"));
                    }
                    // line 136
                    echo "                        </div>
                    </td>
                </tr>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 141
            echo "        </table>
        <br>";
        }
        // line 145
        if ((!twig_test_empty($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "tugas")))) {
            // line 146
            echo "        <b><i class=\"icon-tasks\"></i> Tugas </b>(ditemukan";
            echo twig_escape_filter($this->env, count($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "tugas")), "html", null, true);
            echo " record)
        <table class=\"table table-condensed table-striped\">";
            // line 148
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "tugas"));
            foreach ($context['_seq'] as $context["no"] => $context["m"]) {
                // line 149
                if ((is_admin() || is_pengajar())) {
                    // line 150
                    echo "                <tr>
                    <td>";
                    // line 152
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
                    echo "
                    </td>
                    <td width=\"20%\">
                        <div class=\"btn-group\">";
                    // line 156
                    if ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Ganda") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Essay"))) {
                        // line 157
                        echo anchor(("tugas/manajemen_soal/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon icon-tasks\"></i> Soal", array("class" => "btn btn-primary btn-small"));
                    }
                    // line 159
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") == 0)) {
                        // line 160
                        echo anchor(((("tugas/terbitkan/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(((current_url() . "?q=") . (isset($context["keyword"]) ? $context["keyword"] : null)))), "<i class=\"icon-ok\"></i> Terbitkan", array("class" => "btn btn-success btn-small"));
                    } elseif (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") == 1)) {
                        // line 162
                        echo anchor(((("tugas/tutup/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(((current_url() . "?q=") . (isset($context["keyword"]) ? $context["keyword"] : null)))), "<i class=\"icon-minus\"></i> Tutup", array("class" => "btn btn-danger btn-small"));
                    }
                    // line 165
                    echo anchor(((("tugas/edit/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(((current_url() . "?q=") . (isset($context["keyword"]) ? $context["keyword"] : null)))), "<i class=\"icon-edit\"></i> Edit", array("class" => "btn btn-default btn-small"));
                    // line 166
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_id") == 3)) {
                        // line 167
                        echo anchor(("tugas/nilai/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-eye-open\"></i> Lihat Nilai", array("class" => "btn btn-info btn-small"));
                    } else {
                        // line 169
                        echo anchor(("tugas/koreksi/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-check\"></i> Koreksi", array("class" => "btn btn-info btn-small"));
                    }
                    // line 171
                    echo "                        </div>
                    </td>
                </tr>";
                } else {
                    // line 175
                    echo "                <tr>
                    <td>
                        <a href=\"";
                    // line 177
                    echo twig_escape_filter($this->env, site_url(("tugas?judul=" . urlencode($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul")))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
                    echo "</a>
                    </td>
                </tr>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['no'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 182
            echo "        </table><br>";
        }
        // line 185
        if ((!twig_test_empty($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pesan")))) {
            // line 186
            echo "        <b><i class=\"icon-comments\"></i> Pesan </b>(ditemukan";
            echo twig_escape_filter($this->env, count($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pesan")), "html", null, true);
            echo " record)
        <div class=\"message\">
        <table class=\"table table-message\">
            <tbody>";
            // line 190
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pesan"));
            foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                // line 191
                echo "                <tr class=\"";
                echo ((($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "opened") == 0)) ? ("unread") : (""));
                echo " clickable-row\" data-href=\"";
                echo twig_escape_filter($this->env, site_url(((("message/detail/" . $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id")) . "#msg-") . $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id"))), "html", null, true);
                echo "\">
                    <td class=\"cell-author\">
                        <img style=\"height:30px;width:30px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
                // line 193
                echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "foto"), "medium", $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "jenis_kelamin")), "html", null, true);
                echo "\">
                        <a href=\"";
                // line 194
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "link_profil"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, character_limiter($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "nama"), 23, "..."), "html", null, true);
                echo "</a>
                        <br><small>";
                // line 195
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "date"), "html", null, true);
                echo "</small>
                    </td>
                    <td class=\"cell-title hidden-phone hidden-tablet\">
                        <a class=\"pull-right\" style=\"margin-left:10px;\" href=\"";
                // line 198
                echo twig_escape_filter($this->env, site_url((("message/detail/" . $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id")) . "/?confirm=1#confirm")), "html", null, true);
                echo "\"><i class=\"icon-trash\"></i></a>";
                // line 199
                if ((!twig_test_empty($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "receiver")))) {
                    // line 200
                    echo "                        <div>To <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "receiver"), "link_profil"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "receiver"), "nama"), "html", null, true);
                    echo "</a></div>";
                }
                // line 202
                echo character_limiter(strip_tags($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "content")), 80, "...");
                echo "
                    </td>
                </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 206
            echo "            </tbody>
        </table>
        <div>
        <br>";
        }
        // line 212
        if ((!twig_test_empty($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pengumuman")))) {
            // line 213
            echo "        <b><i class=\"icon-bullhorn\"></i> Pengumuman </b>(ditemukan";
            echo twig_escape_filter($this->env, count($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pengumuman")), "html", null, true);
            echo " record)
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"5%\">ID</th>
                    <th>Judul</th>
                    <th width=\"17%\">Tgl. Tampil</th>
                    <th width=\"17%\">Tgl. Tutup</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>";
            // line 225
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["results"]) ? $context["results"] : null), "pengumuman"));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 226
                echo "                <tr>
                    <td><b>";
                // line 227
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "</b></td>
                    <td><a href=\"";
                // line 228
                echo twig_escape_filter($this->env, site_url(("pengumuman/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
                echo "\"><b>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "judul"), "html", null, true);
                echo "</b></a></td>
                    <td>";
                // line 229
                echo twig_escape_filter($this->env, tgl_indo($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "tgl_tampil")), "html", null, true);
                echo "</td>
                    <td>";
                // line 230
                echo twig_escape_filter($this->env, tgl_indo($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "tgl_tutup")), "html", null, true);
                echo "</td>
                    <td>
                        <div class=\"btn-group\">";
                // line 233
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "allow_action"));
                foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
                    // line 234
                    if (((isset($context["a"]) ? $context["a"] : null) == "detail")) {
                        // line 235
                        echo "                            <a class=\"btn btn-default btn-small\" href=\"";
                        echo twig_escape_filter($this->env, site_url(("pengumuman/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
                        echo "\" data-toggle=\"tooltip\" title=\"Detail\"><i class=\"icon-zoom-in\"></i></a>";
                    }
                    // line 238
                    if (((isset($context["a"]) ? $context["a"] : null) == "edit")) {
                        // line 239
                        echo "                            <a class=\"btn btn-default btn-small\" href=\"";
                        echo twig_escape_filter($this->env, site_url(("pengumuman/edit/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
                        echo "\" data-toggle=\"tooltip\" title=\"Edit\"><i class=\"icon-edit\"></i></a>";
                    }
                    // line 242
                    if (((isset($context["a"]) ? $context["a"] : null) == "delete")) {
                        // line 243
                        echo "                            <a onclick=\"return confirm('Anda yakin ingin menghapus?')\" class=\"btn btn-default btn-small\" href=\"";
                        echo twig_escape_filter($this->env, site_url(("pengumuman/delete/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
                        echo "\" data-toggle=\"tooltip\" title=\"Edit\"><i class=\"icon-trash\"></i></a>";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 246
                echo "                        </div>
                    </td>
                </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 250
            echo "            </tbody>
        </table>
        <br>";
        }
        // line 254
        echo "
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "search-results.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  536 => 254,  531 => 250,  523 => 246,  514 => 243,  512 => 242,  507 => 239,  505 => 238,  500 => 235,  498 => 234,  494 => 233,  489 => 230,  485 => 229,  479 => 228,  475 => 227,  472 => 226,  468 => 225,  453 => 213,  451 => 212,  445 => 206,  436 => 202,  429 => 200,  427 => 199,  424 => 198,  418 => 195,  412 => 194,  408 => 193,  400 => 191,  396 => 190,  389 => 186,  387 => 185,  384 => 182,  372 => 177,  368 => 175,  363 => 171,  360 => 169,  357 => 167,  355 => 166,  353 => 165,  350 => 162,  347 => 160,  345 => 159,  342 => 157,  340 => 156,  334 => 152,  331 => 150,  329 => 149,  325 => 148,  320 => 146,  318 => 145,  314 => 141,  305 => 136,  302 => 134,  300 => 133,  297 => 130,  295 => 129,  293 => 127,  290 => 125,  287 => 123,  285 => 122,  279 => 118,  276 => 116,  268 => 112,  264 => 110,  262 => 109,  258 => 105,  256 => 104,  253 => 102,  251 => 101,  249 => 100,  246 => 98,  244 => 97,  242 => 96,  238 => 95,  233 => 93,  231 => 92,  227 => 88,  219 => 84,  214 => 82,  208 => 78,  204 => 77,  200 => 76,  196 => 75,  192 => 74,  188 => 73,  182 => 71,  180 => 70,  173 => 66,  170 => 64,  168 => 63,  166 => 62,  162 => 61,  158 => 60,  154 => 58,  150 => 57,  145 => 55,  143 => 54,  139 => 50,  131 => 46,  126 => 44,  120 => 40,  115 => 39,  110 => 37,  108 => 36,  105 => 35,  101 => 34,  97 => 33,  93 => 32,  87 => 30,  85 => 29,  76 => 25,  71 => 24,  67 => 23,  63 => 21,  59 => 20,  54 => 18,  52 => 17,  48 => 14,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
