<?php

/* list-materi.html */
class __TwigTemplate_7f857167ed078456c7dacce5699c3c84c4bbedc1d2c03ce6f2834231bba6a50b extends Twig_Template
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
        echo "Materi -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Materi</h3>
    </div>
    <div class=\"module-body\">";
        // line 13
        echo get_flashdata("materi");
        echo "

        <div class=\"bs-callout bs-callout-info\">";
        // line 16
        if ((is_siswa() == false)) {
            // line 17
            echo "            <div class=\"btn-group pull-right\" style=\"margin-top:-5px;\">";
            // line 18
            echo anchor("materi/add/tertulis", "Tambah Materi Tertulis", array("class" => "btn btn-primary"));
            // line 19
            echo anchor("materi/add/file", "Tambah Materi File", array("class" => "btn btn-primary"));
            echo "
            </div>";
        }
        // line 22
        echo "            <b><a class=\"as-link\" data-toggle=\"collapse\" data-target=\"#form-filter\"><i class=\"icon-search\" style=\"line-height: 0px;\"></i> PARAMETER PENCARIAN</a></b>

            <div id=\"form-filter\" class=\"collapse\" style=\"margin-top: 5px;\">";
        // line 25
        echo form_open("materi");
        echo "
                    <table class=\"table table-condensed\">
                        <tr>
                            <th  style=\"border-top: none;\">Mapel</th>
                            <td  style=\"border-top: none;\">
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 32
            echo "                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"mapel_id[]\" value=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\"";
            echo twig_escape_filter($this->env, set_checkbox("mapel_id[]", $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "mapel_id"))) && in_array($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "mapel_id")))) ? (true) : (""))), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "
                                        </label>
                                    </li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">";
        // line 45
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 46
            echo "                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"kelas_id[]\" value=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "\"";
            echo twig_escape_filter($this->env, set_checkbox("kelas_id[]", $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "kelas_id"))) && in_array($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "kelas_id")))) ? (true) : (""))), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "
                                        </label>
                                    </li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Tipe</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"tertulis\"";
        // line 61
        echo twig_escape_filter($this->env, set_checkbox("type[]", "tertulis", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("tertulis", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> Tertulis
                                        </label>
                                    </li>
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"file\"";
        // line 66
        echo twig_escape_filter($this->env, set_checkbox("type[]", "file", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("file", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> File
                                        </label>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th width=\"15%\">Judul</th>
                            <td>
                                <input type=\"text\" name=\"judul\" class=\"span4\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, set_value("judul", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "judul")), "html", null, true);
        echo "\">
                            </td>
                        </tr>
                        <tr>
                            <th>Konten</th>
                            <td>
                                <input type=\"text\" name=\"konten\" class=\"span5\" value=\"";
        // line 81
        echo twig_escape_filter($this->env, set_value("konten", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "konten")), "html", null, true);
        echo "\">
                            </td>
                        </tr>";
        // line 84
        if ((is_admin() == true)) {
            // line 85
            echo "                        <tr>
                            <th>Pembuat</th>
                            <td>
                                <input type=\"text\" name=\"pembuat\" class=\"span4\" value=\"";
            // line 88
            echo twig_escape_filter($this->env, set_value("pembuat", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "pembuat")), "html", null, true);
            echo "\">
                            </td>
                        </tr>";
        }
        // line 92
        echo "                        <tr>
                            <th>Status</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"publish[]\" value=\"1\"";
        // line 98
        echo twig_escape_filter($this->env, set_checkbox("publish[]", "1", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "publish"))) && in_array("1", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "publish")))) ? (true) : (""))), "html", null, true);
        echo "> Terbit
                                        </label>
                                    </li>
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"publish[]\" value=\"0\"";
        // line 103
        echo twig_escape_filter($this->env, set_checkbox("publish[]", "0", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "publish"))) && in_array("0", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "publish")))) ? (true) : (""))), "html", null, true);
        echo "> Konsep
                                        </label>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type=\"submit\" class=\"btn btn-primary\">Filter</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>

        <br>

        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"7%\">ID</th>
                    <th>Informasi Materi</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>";
        // line 132
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["materi"]) ? $context["materi"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["m"]) {
            // line 134
            if ((is_admin() == true)) {
                // line 135
                $context["action_edit"] = true;
                // line 136
                $context["action_delete"] = true;
            } elseif ((is_pengajar() == true)) {
                // line 138
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pengajar_id") == get_sess_data("user", "id"))) {
                    // line 139
                    $context["action_edit"] = true;
                    // line 140
                    $context["action_delete"] = true;
                } else {
                    // line 142
                    $context["action_edit"] = false;
                    // line 143
                    $context["action_delete"] = false;
                }
            } elseif ((is_siswa() == true)) {
                // line 146
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "siswa_id") == get_sess_data("user", "id"))) {
                    // line 147
                    $context["action_edit"] = true;
                    // line 148
                    $context["action_delete"] = true;
                } else {
                    // line 150
                    $context["action_edit"] = false;
                    // line 151
                    $context["action_delete"] = false;
                }
            }
            // line 154
            echo "
                <tr>
                    <td><b>";
            // line 156
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "</b></td>
                    <td>
                        <p><strong class=\"text-warning\">";
            // line 159
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
            echo "
                        </strong></p>
                        <ul class=\"breadcrumb\" style=\"padding: 0px;background: none;\">
                            <li>";
            // line 163
            echo ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "publish") == 1)) ? ("<span class=\"label label-success\">Terbit</span>") : ("<span class=\"label label-warning\">Konsep</span>"));
            echo "
                                <span class=\"divider\">/</span>
                            </li>
                            <li>";
            // line 167
            echo (((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) ? ("<span class=\"label label-success\">File</span>") : ("<span class=\"label label-info\">Tertulis</span>"));
            echo "
                                <span class=\"divider\">/</span>
                            </li>
                            <li>";
            // line 171
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "mapel"), "nama"), "html", null, true);
            echo "
                                <span class=\"divider\">/</span>
                            </li>
                            <li>";
            // line 175
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "materi_kelas"));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 176
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "nama"), "html", null, true);
                echo "&nbsp;";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 178
            echo "                                <span class=\"divider\">/</span>
                            </li>
                            <li>";
            // line 181
            if ((is_pengajar() == false)) {
                // line 182
                echo "                                    Pembuat <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pembuat"), "link_profil"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pembuat"), "nama"), "html", null, true);
                echo "</a>
                                    ,";
                // line 183
                echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "tgl_posting")), "html", null, true);
            } else {
                // line 185
                echo "                                    Dibuat";
                echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "tgl_posting")), "html", null, true);
            }
            // line 187
            echo "                                <span class=\"divider\">/</span>
                            </li>
                            <li>";
            // line 190
            echo ((twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file"))) ? ("Dibaca") : ("Diunduh"));
            // line 191
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "views"), "html", null, true);
            echo " kali
                                <span class=\"divider\">/</span>
                            </li>
                            <li>";
            // line 195
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "jml_komentar"), "html", null, true);
            echo " Komentar
                            </li>
                        </ul>
                    </td>
                    <td>
                        <div class=\"btn-group\">";
            // line 201
            if ((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) {
                // line 202
                $context["url_type"] = "file";
            } else {
                // line 204
                $context["url_type"] = "tertulis";
            }
            // line 206
            echo anchor(("materi/detail/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-zoom-in\"></i> Detail", array("class" => "btn btn-default btn-small", "target" => "_tab"));
            // line 208
            if (((isset($context["action_edit"]) ? $context["action_edit"] : null) == true)) {
                // line 209
                echo anchor(((((("materi/edit/" . (isset($context["url_type"]) ? $context["url_type"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-edit\"></i> Edit", array("class" => "btn btn-default btn-small"));
            }
            // line 212
            if (((isset($context["action_delete"]) ? $context["action_delete"] : null) == true)) {
                // line 213
                echo anchor(((("materi/delete/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-trash\"></i> Hapus", array("class" => "btn btn-default btn-small", "onclick" => "return confirm('Anda yakin ingin menghapus?')"));
            }
            // line 215
            echo "                        </div>
                    </td>
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 219
        echo "            </tbody>
        </table>
        <br>";
        // line 222
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "list-materi.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  382 => 222,  378 => 219,  370 => 215,  367 => 213,  365 => 212,  362 => 209,  360 => 208,  358 => 206,  355 => 204,  352 => 202,  350 => 201,  342 => 195,  336 => 191,  334 => 190,  330 => 187,  326 => 185,  323 => 183,  316 => 182,  314 => 181,  310 => 178,  303 => 176,  299 => 175,  293 => 171,  287 => 167,  281 => 163,  275 => 159,  270 => 156,  266 => 154,  262 => 151,  260 => 150,  257 => 148,  255 => 147,  253 => 146,  249 => 143,  247 => 142,  244 => 140,  242 => 139,  240 => 138,  237 => 136,  235 => 135,  233 => 134,  229 => 132,  198 => 103,  190 => 98,  182 => 92,  176 => 88,  171 => 85,  169 => 84,  164 => 81,  155 => 75,  143 => 66,  135 => 61,  124 => 52,  111 => 48,  107 => 46,  103 => 45,  95 => 38,  82 => 34,  78 => 32,  74 => 31,  66 => 25,  62 => 22,  57 => 19,  55 => 18,  53 => 17,  51 => 16,  46 => 13,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
