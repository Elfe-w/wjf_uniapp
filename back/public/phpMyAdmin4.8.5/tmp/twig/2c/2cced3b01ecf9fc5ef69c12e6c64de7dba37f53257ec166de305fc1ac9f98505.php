<?php

/* table/structure/action_row_in_structure_table.twig */
class __TwigTemplate_bd09678be18c9133b2e7e283568630fed5b8d5f83aab14f3444e914907984d59 extends Twig_Template
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
        echo "<li class=\"";
        echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
        echo "\">";
        // line 2
        if (((((($context["type"] ?? null) == "text") || (        // line 3
($context["type"] ?? null) == "blob")) || (        // line 4
($context["tbl_storage_engine"] ?? null) == "ARCHIVE")) ||         // line 5
($context["has_field"] ?? null))) {
            // line 6
            echo $this->getAttribute(($context["titles"] ?? null), ("No" . ($context["action"] ?? null)), [], "array");
        } else {
            // line 8
            echo "    <a rel=\"samepage\" class=\"ajax add_key print_ignore";
            // line 9
            if (($context["has_link_class"] ?? null)) {
                // line 10
                echo "            add_primary_key_anchor";
            } elseif ((            // line 11
($context["action"] ?? null) == "Index")) {
                // line 12
                echo "            add_index_anchor";
            } elseif ((            // line 13
($context["action"] ?? null) == "Unique")) {
                // line 14
                echo "            add_unique_anchor";
            } elseif ((            // line 15
($context["action"] ?? null) == "Spatial")) {
                // line 16
                echo "            add_spatial_anchor";
            }
            // line 17
            echo "\" href=\"tbl_structure.php\" data-post=\"";
            echo ($context["url_query"] ?? null);
            // line 18
            echo "&amp;add_key=1&amp;sql_query=";
            // line 19
            echo twig_escape_filter($this->env, twig_urlencode_filter(((((((("ALTER TABLE " . PhpMyAdmin\Util::backquote(            // line 20
($context["table"] ?? null))) . ((            // line 21
($context["is_primary"] ?? null)) ? (((($context["primary"] ?? null)) ? (" DROP PRIMARY KEY,") : (""))) : (""))) . " ") .             // line 23
($context["syntax"] ?? null)) . "(") . PhpMyAdmin\Util::backquote($this->getAttribute(            // line 25
($context["row"] ?? null), "Field", [], "array"))) . ");")), "html", null, true);
            // line 27
            echo "&amp;message_to_show=";
            echo twig_escape_filter($this->env, twig_urlencode_filter(sprintf(($context["message"] ?? null), twig_escape_filter($this->env, $this->getAttribute(($context["row"] ?? null), "Field", [], "array")))), "html", null, true);
            echo "\">";
            // line 28
            echo $this->getAttribute(($context["titles"] ?? null), ($context["action"] ?? null), [], "array");
            echo "
    </a>";
        }
        // line 31
        echo "</li>
";
    }

    public function getTemplateName()
    {
        return "table/structure/action_row_in_structure_table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 31,  65 => 28,  61 => 27,  59 => 25,  58 => 23,  57 => 21,  56 => 20,  55 => 19,  53 => 18,  50 => 17,  47 => 16,  45 => 15,  43 => 14,  41 => 13,  39 => 12,  37 => 11,  35 => 10,  33 => 9,  31 => 8,  28 => 6,  26 => 5,  25 => 4,  24 => 3,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/structure/action_row_in_structure_table.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\structure\\action_row_in_structure_table.twig");
    }
}
