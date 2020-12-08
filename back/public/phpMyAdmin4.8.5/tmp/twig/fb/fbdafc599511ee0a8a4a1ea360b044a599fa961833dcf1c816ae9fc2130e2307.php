<?php

/* columns_definitions/column_definitions_form.twig */
class __TwigTemplate_1109532d1693b75b72a6e57e9c7077028eb436ce8d78bee36cbf12f4ff870310 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo "\" class=\"";
        // line 2
        echo (((($context["action"] ?? null) == "tbl_create.php")) ? ("create_table") : ("append_fields"));
        // line 3
        echo "_form ajax lock-page\">";
        // line 4
        echo PhpMyAdmin\Url::getHiddenInputs(($context["form_params"] ?? null));
        // line 8
        echo "    <input type=\"hidden\" name=\"primary_indexes\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, (( !twig_test_empty(($context["primary_indexes"] ?? null))) ? (($context["primary_indexes"] ?? null)) : ("[]")), "html", null, true);
        echo "\">
    <input type=\"hidden\" name=\"unique_indexes\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, (( !twig_test_empty(($context["unique_indexes"] ?? null))) ? (($context["unique_indexes"] ?? null)) : ("[]")), "html", null, true);
        echo "\">
    <input type=\"hidden\" name=\"indexes\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, (( !twig_test_empty(($context["indexes"] ?? null))) ? (($context["indexes"] ?? null)) : ("[]")), "html", null, true);
        echo "\">
    <input type=\"hidden\" name=\"fulltext_indexes\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, (( !twig_test_empty(($context["fulltext_indexes"] ?? null))) ? (($context["fulltext_indexes"] ?? null)) : ("[]")), "html", null, true);
        echo "\">
    <input type=\"hidden\" name=\"spatial_indexes\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, (( !twig_test_empty(($context["spatial_indexes"] ?? null))) ? (($context["spatial_indexes"] ?? null)) : ("[]")), "html", null, true);
        echo "\">";
        // line 19
        if ((($context["action"] ?? null) == "tbl_create.php")) {
            // line 20
            echo "        <div id=\"table_name_col_no_outer\">
            <table id=\"table_name_col_no\" class=\"tdblock\">
                <tr class=\"vmiddle floatleft\">
                    <td>";
            // line 23
            echo _gettext("Table name");
            echo ":
                    <input type=\"text\"
                        name=\"table\"
                        size=\"40\"
                        maxlength=\"64\"
                        value=\"";
            // line 28
            echo twig_escape_filter($this->env, (((isset($context["table"]) || array_key_exists("table", $context))) ? (($context["table"] ?? null)) : ("")), "html", null, true);
            echo "\"
                        class=\"textfield\" autofocus required />
                    </td>
                    <td>";
            // line 32
            echo _gettext("Add");
            // line 33
            echo "                        <input type=\"number\"
                            id=\"added_fields\"
                            name=\"added_fields\"
                            size=\"2\"
                            value=\"1\"
                            min=\"1\"
                            onfocus=\"this.select()\" />";
            // line 40
            echo _gettext("column(s)");
            // line 41
            echo "                        <input type=\"button\"
                            name=\"submit_num_fields\"
                            value=\"";
            // line 43
            echo _gettext("Go");
            echo "\" />
                    </td>
                </tr>
            </table>
        </div>";
        }
        // line 49
        if (twig_test_iterable(($context["content_cells"] ?? null))) {
            // line 50
            $this->loadTemplate("columns_definitions/table_fields_definitions.twig", "columns_definitions/column_definitions_form.twig", 50)->display(["is_backup" =>             // line 51
($context["is_backup"] ?? null), "fields_meta" =>             // line 52
($context["fields_meta"] ?? null), "mimework" =>             // line 53
($context["mimework"] ?? null), "content_cells" =>             // line 54
($context["content_cells"] ?? null), "change_column" =>             // line 55
($context["change_column"] ?? null), "is_virtual_columns_supported" =>             // line 56
($context["is_virtual_columns_supported"] ?? null), "browse_mime" =>             // line 57
($context["browse_mime"] ?? null), "server_type" =>             // line 58
($context["server_type"] ?? null), "max_rows" =>             // line 59
($context["max_rows"] ?? null), "char_editing" =>             // line 60
($context["char_editing"] ?? null), "attribute_types" =>             // line 61
($context["attribute_types"] ?? null), "privs_available" =>             // line 62
($context["privs_available"] ?? null), "max_length" =>             // line 63
($context["max_length"] ?? null), "dbi" =>             // line 64
($context["dbi"] ?? null), "disable_is" =>             // line 65
($context["disable_is"] ?? null)]);
        }
        // line 68
        if ((($context["action"] ?? null) == "tbl_create.php")) {
            // line 69
            echo "        <div class=\"responsivetable\">
        <table>
            <tr class=\"vtop\">
                <th>";
            // line 72
            echo _gettext("Table comments:");
            echo "</th>
                <td width=\"25\">&nbsp;</td>
                <th>";
            // line 74
            echo _gettext("Collation:");
            echo "</th>
                <td width=\"25\">&nbsp;</td>
                <th>";
            // line 77
            echo _gettext("Storage Engine:");
            // line 78
            echo PhpMyAdmin\Util::showMySQLDocu("Storage_engines");
            echo "
                </th>
                <td width=\"25\">&nbsp;</td>
                <th>";
            // line 82
            echo _gettext("Connection:");
            // line 83
            echo PhpMyAdmin\Util::showMySQLDocu("federated-create-connection");
            echo "
                </th>
            </tr>
            <tr>
                <td>
                    <input type=\"text\"
                        name=\"comment\"
                        size=\"40\"
                        maxlength=\"60\"
                        value=\"";
            // line 92
            echo twig_escape_filter($this->env, (((isset($context["comment"]) || array_key_exists("comment", $context))) ? (($context["comment"] ?? null)) : ("")), "html", null, true);
            echo "\"
                        class=\"textfield\" />
                </td>
                <td width=\"25\">&nbsp;</td>
                <td>";
            // line 97
            echo PhpMyAdmin\Charsets::getCollationDropdownBox(            // line 98
($context["dbi"] ?? null),             // line 99
($context["disable_is"] ?? null), "tbl_collation", null,             // line 102
($context["tbl_collation"] ?? null), false);
            // line 104
            echo "
                </td>
                <td width=\"25\">&nbsp;</td>
                <td>";
            // line 108
            echo PhpMyAdmin\StorageEngine::getHtmlSelect("tbl_storage_engine", null,             // line 111
($context["tbl_storage_engine"] ?? null));
            // line 112
            echo "
                </td>
                <td width=\"25\">&nbsp;</td>
                <td>
                    <input type=\"text\"
                        name=\"connection\"
                        size=\"40\"
                        value=\"";
            // line 119
            echo twig_escape_filter($this->env, (((isset($context["connection"]) || array_key_exists("connection", $context))) ? (($context["connection"] ?? null)) : ("")), "html", null, true);
            echo "\"
                        placeholder=\"scheme://user_name[:password]@host_name[:port_num]/db_name/tbl_name\"
                        class=\"textfield\"
                        required=\"required\" />
                </td>
            </tr>";
            // line 125
            if (($context["have_partitioning"] ?? null)) {
                // line 126
                echo "                <tr class=\"vtop\">
                    <th colspan=\"5\">";
                // line 128
                echo _gettext("PARTITION definition:");
                // line 129
                echo PhpMyAdmin\Util::showMySQLDocu("Partitioning");
                echo "
                    </th>
                </tr>
                <tr>
                    <td colspan=\"5\">";
                // line 134
                $this->loadTemplate("columns_definitions/partitions.twig", "columns_definitions/column_definitions_form.twig", 134)->display(["partition_details" =>                 // line 135
($context["partition_details"] ?? null)]);
                // line 137
                echo "                    </td>
                </tr>";
            }
            // line 140
            echo "        </table>
        </div>";
        }
        // line 143
        echo "    <fieldset class=\"tblFooters\">
        <input type=\"button\"
            class=\"preview_sql\"
            value=\"";
        // line 146
        echo _gettext("Preview SQL");
        echo "\" />
        <input type=\"submit\"
            name=\"do_save_data\"
            value=\"";
        // line 149
        echo _gettext("Save");
        echo "\" />
    </fieldset>
    <div id=\"properties_message\"></div>
</form>
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_definitions_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 149,  221 => 146,  216 => 143,  212 => 140,  208 => 137,  206 => 135,  205 => 134,  198 => 129,  196 => 128,  193 => 126,  191 => 125,  183 => 119,  174 => 112,  172 => 111,  171 => 108,  166 => 104,  164 => 102,  163 => 99,  162 => 98,  161 => 97,  154 => 92,  142 => 83,  140 => 82,  134 => 78,  132 => 77,  127 => 74,  122 => 72,  117 => 69,  115 => 68,  112 => 65,  111 => 64,  110 => 63,  109 => 62,  108 => 61,  107 => 60,  106 => 59,  105 => 58,  104 => 57,  103 => 56,  102 => 55,  101 => 54,  100 => 53,  99 => 52,  98 => 51,  97 => 50,  95 => 49,  87 => 43,  83 => 41,  81 => 40,  73 => 33,  71 => 32,  65 => 28,  57 => 23,  52 => 20,  50 => 19,  47 => 17,  43 => 15,  39 => 13,  35 => 11,  31 => 9,  29 => 8,  27 => 4,  25 => 3,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "columns_definitions/column_definitions_form.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\columns_definitions\\column_definitions_form.twig");
    }
}
