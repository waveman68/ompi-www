<?php
$topdir = "../../..";
$title = "MPI_T(5) man page (version 5.0.0rc2)";
$meta_desc = "Open MPI v5.0.0rc2 man page: MPI_T(5)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<p>
Open MPI[cq]s MPI_T interface - General information
<h2><a name='sect1' href='#toc1'>Description</a></h2>
<p>
There
are a few Open MPI-specific notes worth mentioning about its C]MPI_TR] interface
implementation.
<h3><a name='sect2' href='#toc2'>MPI_T Control Variables</a></h3>
<p>
Open MPI[cq]s implementation of the
C]MPI_TR] Control Variable ([lq]cvar[rq]) APIs is an interface to Open
MPI[cq]s underlying Modular Component Architecture (MCA) parameters/variables.
Simply put: using the C]MPI_TR] cvar interface is another mechanism to
get/set Open MPI MCA parameters. <p>
In order of precedence (highest to lowest),
Open MPI provides the following mechanisms to set MCA parameters:
<dl>

<dt>1.</dt>
<dd>The
C]MPI_TR] interface has the highest precedence. Specifically: values set
via the C]MPI_TR] interface will override all other settings. </dd>

<dt>2.</dt>
<dd>The C]<i>mpirun(1)</i>R]
/ C]<i>mpiexec(1)</i>R] command line (e.g., via the C]--mcaR] parameter). </dd>

<dt>3.</dt>
<dd>Environment
variables. </dd>

<dt>4.</dt>
<dd>Parameter files have the lowest precedence. Specifically: values
set via parameter files can be overridden by any of the other MCA-variable
setting mechanisms. </dd>
</dl>

<h3><a name='sect3' href='#toc3'>MPI initialization</a></h3>
<p>
An application may use the C]MPI_TR]
interface before MPI is initialized to set MCA parameters. Setting MPI-level
MCA parameters before MPI is initialized may affect I]howR] MPI is initialized
(e.g., by influencing which frameworks and components are selected). <p>
The following
example sets the C]pmlR] and C]btlR] MCA params before invoking C]<i><a href="../man3/MPI_Init.3.php">MPI_Init</a>(3)</i>R]
in order to force a specific selection of PML and BTL components: <br>
<pre>

</pre><p>

<dl>

<dt>C]int provided, index, count;MPI_T_cvar_handle pml_handle, btl_handle;char
pml_value[64], btl_value[64];<a href="../man3/MPI_T_init_thread.3.php">MPI_T_init_thread</a>(MPI_THREAD_SINGLE, &amp;provided);MPI_T_cvar_get_index([dq]pml[dq],
&amp;index);<a href="../man3/MPI_T_cvar_handle_alloc.3.php">MPI_T_cvar_handle_alloc</a>(index, NULL, &amp;pml_handle, &amp;count);<a href="../man3/MPI_T_cvar_write.3.php">MPI_T_cvar_write</a>(pml_handle,
[dq]ob1[dq]);MPI_T_cvar_get_index([dq]btl[dq], &amp;index);<a href="../man3/MPI_T_cvar_handle_alloc.3.php">MPI_T_cvar_handle_alloc</a>(index,
NULL, &amp;btl_handle, &amp;count);<a href="../man3/MPI_T_cvar_write.3.php">MPI_T_cvar_write</a>(btl_handle, [dq]tcp,vader,self[dq]);<a href="../man3/MPI_T_cvar_read.3.php">MPI_T_cvar_read</a>(pml_handle,
pml_value);<a href="../man3/MPI_T_cvar_read.3.php">MPI_T_cvar_read</a>(btl_handle, btl_value);printf([dq]Set value
of cvars: PML: %s, BTL: %s[rs]n[dq],       pml_value, btl_value);<a href="../man3/MPI_T_cvar_handle_free.3.php">MPI_T_cvar_handle_free</a>(&amp;pml_handle);<a href="../man3/MPI_T_cvar_handle_free.3.php">MPI_T_cvar_handle_free</a>(&amp;btl_handle);<a href="../man3/MPI_Init.3.php">MPI_Init</a>(NULL,
NULL);// ...<a href="../man3/MPI_Finalize.3.php">MPI_Finalize</a>();<a href="../man3/MPI_T_finalize.3.php">MPI_T_finalize</a>();R]Note that once MPI is initialized,
most Open MPI cvars become read-only. </dt>
<dd></dd>
</dl>
<p>
For example, after MPI is initialized,
it is no longer possible to set the PML and BTL selection mechanisms. This
is because many of these MCA parameters are only used during MPI initialization;
setting them after MPI has already been initialized would be meaningless,
anyway.
<h3><a name='sect4' href='#toc4'>MPI_T Categories</a></h3>
<p>
Open MPI[cq]s MPI_T categories are organized hierarchically:

<dl>

<dt>1.</dt>
<dd>Layer (or [lq]project[rq]). There are two layers in Open MPI: <blockquote></dd>

<dt>[bu]</dt>
<dd>C]ompiR]:
This layer contains cvars, pvars, and sub categories related to MPI characteristics.
</dd>

<dt>[bu]</dt>
<dd>C]opalR]: This layer generally contains cvars, pvars, and sub categories
of lower-layer constructions, such as operating system issues, networking
issues, etc. </dd>
</dl>
</blockquote>

<ol>
.<li>Framework or section. <blockquote></dd>

<dt>[bu]</dt>
<dd>In most cases, the next level in the
hierarchy is the Open MPI MCA framework. <blockquote></dd>

<dt>[bu]</dt>
<dd>For example, you can find the
C]btlR] framework under the C]opalR] layer (because it has to do with the
underlying networking). </dd>

<dt>[bu]</dt>
<dd>Additionally, the C]pmlR] framework is under
the C]ompiR] layer (because it has to do with MPI semantics of point-to-point
messaging). </dd>
</dl>
</blockquote>

<dl>

<dt>[bu]</dt>
<dd>There are a few non-MCA-framework entities under the layer,
however. <blockquote></dd>

<dt>[bu]</dt>
<dd>For example, there is an C]mpiR] section under both the C]opalR]
and C]ompiR] layers for general/core MPI constructs. </dd>
</dl>
</blockquote>
</blockquote>

<dl>

<dt>3.</dt>
<dd>Component. <blockquote></dd>

<dt>[bu]</dt>
<dd>If relevant,
the third level in the hierarchy is the MCA component. </dd>

<dt>[bu]</dt>
<dd>For example,
the C]tcpR] component can be found under the C]opalR] framework in the
C]opalR] layer. </dd>
</dl>
</blockquote>

<h2><a name='sect5' href='#toc5'>See Also</a></h2>
<p>
C]MPI_T_initR](3), C]MPI_T_finalizeR](3) <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Description</a></li>
<ul>
<li><a name='toc2' href='#sect2'>MPI_T Control Variables</a></li>
<li><a name='toc3' href='#sect3'>MPI initialization</a></li>
<li><a name='toc4' href='#sect4'>MPI_T Categories</a></li>
</ul>
<li><a name='toc5' href='#sect5'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
