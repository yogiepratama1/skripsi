<?php

/* list-tugas.html */
class __TwigTemplate_8ac215a290914e04874404a546e9c3097768976d6925efc804ad62a129b0e746 extends Twig_Template
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
        echo "Tugas -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Tugas</h3>
    </div>
    <div class=\"module-body\">";
        // line 13
        echo get_flashdata("tugas");
        echo "

        <div class=\"bs-callout bs-callout-info\">";
        // line 16
        if ((is_siswa() == false)) {
            // line 17
            echo "            <div class=\"btn-group pull-right\" style=\"margin-top:-5px;\">";
            // line 18
            // line 20
            echo anchor("tugas/add/1", "Tambah Tugas Upload", array("class" => "btn btn-primary"));
            echo "
            </div>";
        }
        // line 23
        echo "            <b><a class=\"as-link\" data-toggle=\"collapse\" data-target=\"#form-filter\"><i class=\"icon-search\" style=\"line-height: 0px;\"></i> PARAMETER PENCARIAN</a></b>

            <div id=\"form-filter\" class=\"collapse\" style=\"margin-top: 5px;\">";
        // line 26
        echo form_open("tugas");
        echo "
                    <table class=\"table table-condensed\">
                        <tr>
                            <th  style=\"border-top: none;\">Mapel</th>
                            <td  style=\"border-top: none;\">
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 33
            echo "                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"mapel_id[]\" value=\"";
            // line 35
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
        // line 39
        echo "                                </ul>
                            </td>
                        </tr>";
        // line 42
        if ((is_siswa() == false)) {
            // line 43
            echo "                        <tr>
                            <th>Kelas</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">";
            // line 47
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                // line 48
                echo "                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"kelas_id[]\" value=\"";
                // line 50
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
            // line 54
            echo "                                </ul>
                            </td>
                        </tr>";
        }
        // line 58
        echo "                        <tr>
                            <th>Tipe</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"3\"";
        // line 64
        echo twig_escape_filter($this->env, set_checkbox("type[]", "3", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("3", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> Ganda
                                        </label>
                                    </li>
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"2\"";
        // line 69
        echo twig_escape_filter($this->env, set_checkbox("type[]", "2", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("2", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> Essay
                                        </label>
                                    </li>
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"1\"";
        // line 74
        echo twig_escape_filter($this->env, set_checkbox("type[]", "1", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("1", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> Upload
                                        </label>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th width=\"15%\">Judul</th>
                            <td>
                                <input type=\"text\" name=\"judul\" class=\"span4\" value=\"";
        // line 83
        echo twig_escape_filter($this->env, set_value("judul", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "judul")), "html", null, true);
        echo "\">
                            </td>
                        </tr>
                        <tr>
                            <th>Info</th>
                            <td>
                                <input type=\"text\" name=\"info\" class=\"span5\" value=\"";
        // line 89
        echo twig_escape_filter($this->env, set_value("info", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "info")), "html", null, true);
        echo "\">
                            </td>
                        </tr>";
        // line 92
        if ((is_pengajar() == false)) {
            // line 93
            echo "                        <tr>
                            <th>Pembuat</th>
                            <td>
                                <input type=\"text\" name=\"pembuat\" class=\"span4\" value=\"";
            // line 96
            echo twig_escape_filter($this->env, set_value("pembuat", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "pembuat")), "html", null, true);
            echo "\">
                            </td>
                        </tr>";
        }
        // line 100
        echo "                        <tr>
                            <th>Status</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"status[]\" value=\"1\"";
        // line 106
        echo twig_escape_filter($this->env, set_checkbox("status[]", "1", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status"))) && in_array("1", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status")))) ? (true) : (""))), "html", null, true);
        echo "> Terbit
                                        </label>
                                    </li>
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"status[]\" value=\"0\"";
        // line 111
        echo twig_escape_filter($this->env, set_checkbox("status[]", "0", (((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status") != "") && in_array("0", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status")))) ? (true) : (""))), "html", null, true);
        echo "> Tutup
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
                    <th>Informasi Tugas</th>
                    <th width=\"15%\">Tipe Tugas</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>";
        // line 141
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tugas"]) ? $context["tugas"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["m"]) {
            // line 142
            echo "                <tr";
            echo ((((is_siswa() && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") == 1)) && (sudah_ngerjakan($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), get_sess_data("user", "id")) == false))) ? ("class=\"success\"") : (""));
            echo ">
                    <td><b>";
            // line 143
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "</b></td>
                    <td>
                        <strong class=\"text-warning\">";
            // line 145
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
            echo "</strong>
                        <br><small><b>";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "mapel"), "nama"), "html", null, true);
            echo "</b>";
            // line 148
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "tugas_kelas"));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 149
                echo "                            ,";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "nama"), "html", null, true);
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            if ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Ganda") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Essay"))) {
                // line 153
                echo "                            ,";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "durasi"), "html", null, true);
                echo " Menit";
            }
            // line 155
            echo "
                        </small>
                        <br><small><b>Pembuat : </b> <a href=\"";
            // line 157
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pembuat"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pembuat"), "nama"), "html", null, true);
            echo "</a>,";
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "tgl_buat")), "html", null, true);
            echo "</small>";
            // line 158
            if ((is_siswa() && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "info") != ""))) {
                // line 159
                echo "                            <hr style=\"margin-top: 5px;margin-bottom: 5px;border:none;border-bottom: 1px dashed black;\">";
                // line 160
                echo $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "info");
            }
            // line 162
            echo "                    </td>
                    <td>";
            // line 164
            if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Ganda")) {
                // line 165
                echo "                            <span class=\"label label-success\">Ganda</span>";
            } elseif (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Essay")) {
                // line 167
                echo "                            <span class=\"label label-info\">Essay</span>";
            } elseif (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Upload")) {
                // line 169
                echo "                            <span class=\"label label-warning\">Upload</span>";
            }
            // line 171
            echo "                    </td>
                    <td>
                        <div class=\"btn-group\">";
            // line 174
            if ((is_siswa() == false)) {
                // line 175
                if ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Ganda") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Essay"))) {
                    // line 176
                    echo anchor(("tugas/manajemen_soal/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon icon-tasks\"></i> Soal", array("class" => "btn btn-primary btn-small"));
                }
                // line 178
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") == 0)) {
                    // line 179
                    echo anchor(((("tugas/terbitkan/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-ok\"></i> Terbitkan", array("class" => "btn btn-success btn-small"));
                } elseif (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") == 1)) {
                    // line 181
                    echo anchor(((("tugas/tutup/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-minus\"></i> Tutup", array("class" => "btn btn-danger btn-small"));
                }
                // line 184
                echo anchor(((("tugas/edit/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-edit\"></i> Edit", array("class" => "btn btn-default btn-small"));
                // line 185
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_id") == 3)) {
                    // line 186
                    echo anchor(("tugas/nilai/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-eye-open\"></i> Lihat Nilai", array("class" => "btn btn-info btn-small"));
                } else {
                    // line 188
                    echo anchor(("tugas/koreksi/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-check\"></i> Koreksi", array("class" => "btn btn-info btn-small"));
                }
            } elseif ((is_siswa() == true)) {
                // line 191
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") == 1)) {
                    // line 192
                    if ((sudah_ngerjakan($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), get_sess_data("user", "id")) == false)) {
                        // line 193
                        echo anchor(("tugas/kerjakan/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-ok-sign\"></i> Mulai Kerjakan", array("class" => "btn btn-success btn-small", "onclick" => "return confirm('Anda yakin ingin memulai mengerjakan tugas ini?')"));
                    }
                } else {
                    // line 196
                    echo anchor(("tugas/nilai/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-flag\"></i> Lihat Nilai", array("class" => "btn btn-info btn-small iframe-lihat-nilai"));
                }
            }
            // line 199
            echo "                        </div>
                    </td>
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 203
        echo "            </tbody>
        </table>
        <br>";
        // line 206
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "list-tugas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  370 => 206,  366 => 203,  358 => 199,  354 => 196,  350 => 193,  348 => 192,  346 => 191,  342 => 188,  339 => 186,  337 => 185,  335 => 184,  332 => 181,  329 => 179,  327 => 178,  324 => 176,  322 => 175,  320 => 174,  316 => 171,  313 => 169,  310 => 167,  307 => 165,  305 => 164,  302 => 162,  299 => 160,  297 => 159,  295 => 158,  288 => 157,  284 => 155,  279 => 153,  277 => 152,  270 => 149,  266 => 148,  263 => 146,  259 => 145,  254 => 143,  249 => 142,  245 => 141,  213 => 111,  205 => 106,  197 => 100,  191 => 96,  186 => 93,  184 => 92,  179 => 89,  170 => 83,  158 => 74,  150 => 69,  142 => 64,  134 => 58,  129 => 54,  116 => 50,  112 => 48,  108 => 47,  103 => 43,  101 => 42,  97 => 39,  84 => 35,  80 => 33,  76 => 32,  68 => 26,  64 => 23,  59 => 20,  57 => 19,  55 => 18,  53 => 17,  51 => 16,  46 => 13,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
