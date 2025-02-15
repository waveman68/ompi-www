<?php
$topdir = "../../..";
$title = "MPI_Win_post(3) man page (version 5.0.0rc2)";
$meta_desc = "Open MPI v5.0.0rc2 man page: MPI_WIN_POST(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Win_post</b> - Starts an RMA exposure epoch for the local window

<p>associated with <i>win</i>
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Win_post(MPI_Group group, int assert, MPI_Win win)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>USE MPI
! or the older form: INCLUDE &rsquo;mpif.h&rsquo;
MPI_WIN_POST(GROUP, ASSERT, WIN, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER GROUP, ASSERT, WIN, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>Fortran 2008 Syntax</a></h2>
<br>
<pre>USE mpi_f08
MPI_Win_post(group, assert, win, ierror)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;TYPE(MPI_Group), INTENT(IN) :: group
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER, INTENT(IN) :: assert
<tt> </tt>&nbsp;<tt> </tt>&nbsp;TYPE(MPI_Win), INTENT(IN) :: win
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER, OPTIONAL, INTENT(OUT) :: ierror
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>group </dt>
<dd>The group of origin processes (handle) </dd>

<dt>assert </dt>
<dd>Program
assertion (integer) </dd>

<dt>win </dt>
<dd>Window object (handle)
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>

<p> Starts an RMA exposure
epoch for the local window associated with <i>win</i>. Only the processes belonging
to <i>group</i> should access the window with RMA calls on <i>win</i> during this epoch.
Each process in <i>group</i> must issue a matching call to <a href="../man3/MPI_Win_start.3.php">MPI_Win_start</a>. MPI_Win_post
does not block. <p>
The <i>assert</i> argument is used to provide assertions on the
context of the call that may be used for various optimizations. A value
of <i>assert</i> = 0 is always valid. The following assertion values are supported:

<dl>

<dt>MPI_MODE_NOCHECK </dt>
<dd>The matching calls to <a href="../man3/MPI_Win_start.3.php">MPI_Win_start</a> have not yet occurred
on any origin processes when this call is made. This assertion must be present
for all matching <a href="../man3/MPI_Win_start.3.php">MPI_Win_start</a> calls if used. </dd>

<dt>MPI_MODE_NOSTORE </dt>
<dd>Informs that
the local window was not updated by local stores or get calls in the preceding
epoch. </dd>

<dt>MPI_MODE_NOPUT </dt>
<dd>Informs that the local window will not be updated
by put or accummulate calls until the ensuing wait synchronization. <p>

<p> </dd>
</dl>

<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. <p>
Before the error value
is returned, the current MPI error handler is called. By default, this error
handler aborts the MPI job, except for I/O function errors. The error handler
may be changed with <a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a>; the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.

<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<a href="../man3/MPI_Win_start.3.php">MPI_Win_start</a> <a href="../man3/MPI_Win_wait.3.php">MPI_Win_wait</a> <br>

<p>
<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>Fortran 2008 Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
