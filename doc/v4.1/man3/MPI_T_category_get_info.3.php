<?php
$topdir = "../../..";
$title = "MPI_T_category_get_info(3) man page (version 4.1.2)";
$meta_desc = "Open MPI v4.1.2 man page: MPI_T_CATEGORY_GET_INFO(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_T_category_get_info</b> - Query information from a category

<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_T_category_get_info(int cat_index, char *name, int *name_len,
char *desc, int *desc_len, int *num_cvars, int *num_pvars,
int *num_categories)
</pre>
<h2><a name='sect3' href='#toc3'>Input Parameters</a></h2>

<dl>

<dt>cat_index </dt>
<dd>Index of the category to be queried.
<p> </dd>
</dl>

<h2><a name='sect4' href='#toc4'>Input/Output
Parameters</a></h2>

<dl>

<dt>name_len </dt>
<dd>Length of the string and/or buffer for name. </dd>

<dt>desc_len
</dt>
<dd>Length of the string and/or buffer for desc.
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>name </dt>
<dd>Buffer
to return the string containing the name of the category. </dd>

<dt>desc </dt>
<dd>Buffer to
return the string containing the description of the category. </dd>

<dt>num_cvars
</dt>
<dd>Number of control variables in the category. </dd>

<dt>num_pvars </dt>
<dd>Number of performance
variables in the category. </dd>

<dt>num_categories </dt>
<dd>Number of categories contained
in the category.
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
MPI_T_category_get_info can be used to query
information from a category. The function returns the number of control
variables, performance variables, and sub-categories in the queried category
in the arguments <i>num_cvars</i>, <i>num_pvars</i>, and <i>num_categories</i>, respectively.

<p>
<h2><a name='sect7' href='#toc7'>Notes</a></h2>
This MPI tool interface function returns two strings. This function
takes two argument for each string: a buffer to store the string, and a
length which must initially specify the size of the buffer. If the length
passed is n then this function will copy at most n - 1 characters of the
string into the corresponding buffer and set the length to the number of
characters copied - 1. If the length argument is NULL or the value specified
in the length is 0 the corresponding string buffer is ignored and the string
is not returned.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
MPI_T_category_get_info() will fail if:
<dl>

<dt>[MPI_T_ERR_NOT_INITIALIZED]
</dt>
<dd>The MPI Tools interface not initialized </dd>

<dt>[MPI_T_ERR_INVALID_INDEX] </dt>
<dd>The category
index is invalid </dd>
</dl>
<p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Input Parameters</a></li>
<li><a name='toc4' href='#sect4'>Input/Output Parameters</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Notes</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
