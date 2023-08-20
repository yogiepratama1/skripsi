<?php

/* detail-siswa.html */
class __TwigTemplate_701b46bda07066f0e1a922e21f13e7808dc725eab965cffe7616ffd80fb2b82a extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nama"), "html", null, true);
        echo " -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">";
        // line 10
        if (is_admin()) {
            // line 11
            echo "        <h3>";
            echo anchor(("siswa/index/" . (isset($context["status_id"]) ? $context["status_id"] : null)), "Data Siswa");
            echo " / Detail Siswa</h3>";
        } else {
            // line 13
            echo "        <h3>";
            echo anchor("siswa/filter", "Filter Siswa");
            echo " / Detail Siswa</h3>";
        }
        // line 15
        echo "    </div>
    <div class=\"module-body\">";
        // line 17
        echo get_flashdata("siswa");
        // line 19
        if (($this->getAttribute((isset($context["siswa_login"]) ? $context["siswa_login"] : null), "id") != get_sess_data("login", "id"))) {
            // line 20
            echo "        <div class=\"row-fluid\">
            <div class=\"span4\">
                <div class=\"btn-group\">
                    <a class=\"btn btn-default btn-sm\" href=\"";
            // line 23
            echo twig_escape_filter($this->env, site_url(("message/to/siswa/" . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-comments\"></i> Kirim Pesan</a>
                </div>
            </div>
        </div>
        <br>";
        }
        // line 29
        echo "
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <strong>Profil Siswa</strong>";
        // line 33
        if (is_admin()) {
            // line 34
            echo "                <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">";
            // line 35
            echo anchor(((("siswa/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Profil", array("class" => "siswa-iframe-4 btn btn-small btn-primary", "title" => "Edit Profil Siswa"));
            // line 36
            echo anchor(((("siswa/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Foto", array("class" => "siswa-iframe-5 btn btn-small btn-primary", "title" => "Edit Foto Siswa"));
            // line 37
            if (is_admin()) {
                // line 38
                echo "                    <!--";
                echo anchor(("login/login_log/" . $this->getAttribute((isset($context["siswa_login"]) ? $context["siswa_login"] : null), "id")), "Login log", array("class" => "btn btn-small btn-default", "title" => "Login log"));
                echo " -->";
            }
            // line 40
            echo "                </div>";
        }
        // line 42
        echo "            </div>
            <div class=\"panel-body\">
                <table class=\"table\">
                    <tr>
                        <th bgcolor=\"#FBFBFB\" width=\"25%\" style=\"border-top: 0px;\">NIS</th>
                        <td style=\"border-top: 0px;\">";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nis"), "html", null, true);
        echo "</td>
                        <td rowspan=\"5\" width=\"15%\" style=\"border-top: 0px;\">
                            <img style=\"width:113px;\" class=\"img-polaroid\" src=\"";
        // line 49
        echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "foto"), "medium", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin")), "html", null, true);
        echo "\">
                        </td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Nama</th>
                        <td>";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nama"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Jenis Kelamin</th>
                        <td>";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Tahun Masuk</th>
                        <td colspan=\"2\">";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tahun_masuk"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Tempat Lahir</th>
                        <td>";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tempat_lahir"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Tanggal Lahir</th>
                        <td>";
        // line 70
        echo twig_escape_filter($this->env, (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (tgl_indo($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"))) : ("")), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Agama</th>
                        <td colspan=\"2\">";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Alamat</th>
                        <td colspan=\"2\">";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "alamat"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Status</th>
                        <td colspan=\"2\">";
        // line 83
        if (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 0)) {
            // line 84
            echo "                                Pending";
        } elseif (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 1)) {
            // line 86
            echo "                                Aktif";
        }
        // line 88
        echo "                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class=\"row-fluid\">
            <div class=\"span6\">
                <div class=\"panel panel-default\" id=\"riwayat-kelas\">
                    <div class=\"panel-heading\">
                        <strong>Riwayat Kelas</strong>";
        // line 99
        if ((is_admin() && ((isset($context["status_id"]) ? $context["status_id"] : null) != 3))) {
            // line 100
            echo "                        <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">";
            // line 101
            echo anchor(((("siswa/moved_class/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Pindah Kelas", array("class" => "siswa-iframe btn btn-small btn-primary", "title" => "Pindah siswa ke Kelas lain"));
            echo "
                        </div>";
        }
        // line 104
        echo "                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table table-striped\">
                        <thead>
                            <tr>
                                <th width=\"5%\">No</th>
                                <th>Kelas</th>";
        // line 111
        if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
            // line 112
            echo "                                    <th>Aktif</th>";
        }
        // line 114
        echo "                            </tr>
                        </thead>
                        <tbody>";
        // line 117
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["siswa_kelas"]) ? $context["siswa_kelas"] : null), "results"));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 118
            echo "                            <tr>
                                <td>";
            // line 119
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
                                <td>";
            // line 121
            echo twig_escape_filter($this->env, get_row_data("kelas_model", "retrieve", array(0 => $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "kelas_id"), 1 => true), "nama"), "html", null, true);
            echo "
                                </td>";
            // line 123
            if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
                // line 124
                echo "                                <td>";
                // line 125
                if (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "aktif") == 1)) {
                    // line 126
                    echo "                                        <i class=\"icon icon-ok\"></i>";
                }
                // line 128
                echo "                                </td>";
            }
            // line 130
            echo "                            </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 132
        echo "                        </tbody>
                        </table>
                    </div>
                </div>
            </div>";
        // line 137
        if (is_admin()) {
            // line 138
            echo "            <div class=\"span6\">
                <div class=\"panel panel-default\" id=\"akun\">
                    <div class=\"panel-heading\">
                        <strong>Akun Login</strong>
                        <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">";
            // line 143
            echo anchor(((("siswa/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Username", array("class" => "siswa-iframe-2 btn btn-small btn-primary", "title" => "Edit Username Siswa"));
            // line 144
            echo anchor(((("siswa/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Password", array("class" => "siswa-iframe-3 btn btn-small btn-primary", "title" => "Edit Password Siswa"));
            echo "
                        </div>
                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table\">
                            <tbody>
                                <tr>
                                    <th width=\"30%\" bgcolor=\"#FBFBFB\" style=\"border-top: 0px;\">Username</th>
                                    <td style=\"border-top: 0px;\">";
            // line 153
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa_login"]) ? $context["siswa_login"] : null), "username"), "html", null, true);
            echo "
                                    </td>
                                </tr>
                                <tr>
                                    <th bgcolor=\"#FBFBFB\">Password</th>
                                    <td>
                                        *********
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>";
        }
        // line 168
        echo "        </div>

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "detail-siswa.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  291 => 168,  274 => 153,  263 => 144,  261 => 143,  255 => 138,  253 => 137,  247 => 132,  241 => 130,  238 => 128,  235 => 126,  233 => 125,  231 => 124,  229 => 123,  225 => 121,  221 => 119,  218 => 118,  214 => 117,  210 => 114,  207 => 112,  205 => 111,  197 => 104,  192 => 101,  190 => 100,  188 => 99,  176 => 88,  173 => 86,  170 => 84,  168 => 83,  161 => 78,  154 => 74,  147 => 70,  140 => 66,  133 => 62,  126 => 58,  119 => 54,  111 => 49,  106 => 47,  99 => 42,  96 => 40,  91 => 38,  89 => 37,  87 => 36,  85 => 35,  83 => 34,  81 => 33,  76 => 29,  68 => 23,  63 => 20,  61 => 19,  59 => 17,  56 => 15,  51 => 13,  46 => 11,  44 => 10,  41 => 8,  38 => 7,  32 => 4,  29 => 3,);
    }
}
