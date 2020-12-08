<?php

/* columns_definitions/column_name.twig */
class __TwigTemplate_7e8d3f48116e84547ce1a1a921e8bbcae012e00413bb84a6b40853693318d454 extends Twig_Template
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
        $context["title"] = "";
        // line 2
        if ($this->getAttribute(($context["column_meta"] ?? null), "column_status", [], "array", true, true)) {
            // line 3
            if ($this->getAttribute($this->getAttribute(($context["column_meta"] ?? null), "column_status", [], "array"), "isReferenced", [], "array")) {
                // line 4
                $context["title"] = (($context["title"] ?? null) . sprintf(_gettext("Referenced by %s."), twig_join_filter($this->getAttribute($this->getAttribute(                // line 5
($context["column_meta"] ?? null), "column_status", [], "array"), "references", [], "array"), ",")));
            }
            // line 8
            if ($this->getAttribute($this->getAttribute(($context["column_meta"] ?? null), "column_status", [], "array"), "isForeignKey", [], "array")) {
                // line 9
                if ( !twig_test_empty(($context["title"] ?? null))) {
                    // line 10
                    $context["title"] = (($context["title"] ?? null) . "
");
                }
                // line 12
                $context["title"] = (($context["title"] ?? null) . _gettext("Is a foreign key."));
            }
        }
        // line 15
        if (twig_test_empty(($context["title"] ?? null))) {
            // line 16
            $context["title"] = _gettext("Column");
        }
        // line 18
        echo "
<input id=\"field_";
        // line 19
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\"";
        // line 20
        if (($this->getAttribute(($context["column_meta"] ?? null), "column_status", [], "array", true, true) &&  !$this->getAttribute($this->getAttribute(        // line 21
($context["column_meta"] ?? null), "column_status", [], "array"), "isEditable", [], "array"))) {
            // line 22
            echo "        disabled=\"disabled\"";
        }
        // line 24
        echo "    type=\"text\"
    name=\"field_name[";
        // line 25
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\"
    maxlength=\"64\"
    class=\"textfield\"
    title=\"";
        // line 28
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "\"
    size=\"10\"
    value=\"";
        // line 30
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array", true, true)) ? ($this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array")) : ("")), "html", null, true);
        echo "\" />";
        // line 32
        if (($this->getAttribute(($context["cfg_relation"] ?? null), "centralcolumnswork", [], "array") &&  !($this->getAttribute(        // line 33
($context["column_meta"] ?? null), "column_status", [], "array", true, true) &&  !$this->getAttribute($this->getAttribute(        // line 34
($context["column_meta"] ?? null), "column_status", [], "array"), "isEditable", [], "array")))) {
            // line 35
            echo "    <p style=\"font-size:80%;margin:5px 2px\"
       id=\"central_columns_";
            // line 36
            echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
            echo "\">
        <a data-maxrows=\"";
            // line 37
            echo twig_escape_filter($this->env, ($context["max_rows"] ?? null), "html", null, true);
            echo "\"
            href=\"#\"
            class=\"central_columns_dialog\">";
            // line 40
            echo _gettext("Pick from Central Columns");
            // line 41
            echo "        </a>
    </p>";
        }
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_name.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 41,  95 => 40,  90 => 37,  84 => 36,  81 => 35,  79 => 34,  78 => 33,  77 => 32,  74 => 30,  69 => 28,  63 => 25,  60 => 24,  57 => 22,  55 => 21,  54 => 20,  49 => 19,  46 => 18,  43 => 16,  41 => 15,  37 => 12,  33 => 10,  31 => 9,  29 => 8,  26 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "columns_definitions/column_name.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\columns_definitions\\column_name.twig");
    }
}
