<?php
$topdir = "../../..";
$title = "MPI_Group_incl(3) man page (version 5.0.0rc2)";
$meta_desc = "Open MPI v5.0.0rc2 man page: MPI_GROUP_INCL(3)";

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
C]MPI_Group_inclR] - Produces a group by reordering an existing group
and taking only listed members.
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h3><a name='sect2' href='#toc2'>C Syntax</a></h3>
<br>
<pre>

</pre>
<h3><a name='sect3' href='#toc3'>C]#include &lt;mpi.h&gt;int MPI_Group_incl(MPI_Group group, int n, const int ranks[],
   MPI_Group *newgroup)R]Fortran Syntax</a></h3>
<br>
<pre>

</pre>
<h3><a name='sect4' href='#toc4'>C]USE MPI! or the older form: INCLUDE [aq]mpif.h[aq]MPI_GROUP_INCL(GROUP,
N, RANKS, NEWGROUP, IERROR)    INTEGER GROUP, N, RANKS(*), NEWGROUP, IERRORR]Fortran
2008 Syntax</a></h3>
<br>
<pre>

</pre>
<h2><a name='sect5' href='#toc5'>C]USE mpi_f08MPI_Group_incl(group, n, ranks, newgroup, ierror)    TYPE(MPI_Group),
INTENT(IN) :: group    INTEGER, INTENT(IN) :: n, <i><i>ranks(n)</i></i>    TYPE(MPI_Group),
INTENT(OUT) :: newgroup    INTEGER, OPTIONAL, INTENT(OUT) :: ierrorR]Input
Parameters</a></h2>

<dl>

<dt>[bu]</dt>
<dd>C]groupR] : Group (handle). </dd>

<dt>[bu]</dt>
<dd>C]nR] : Number of elements
in array ranks (and size of C]newgroupR])(integer). </dd>

<dt>[bu]</dt>
<dd>C]ranksR] : Ranks
of processes in group to appear in newgroup (array of integers). </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output
Parameters</a></h2>

<dl>

<dt>[bu]</dt>
<dd>C]newgroupR] : New group derived from above, in the order
defined by ranks (handle). </dd>

<dt>[bu]</dt>
<dd>C]IERRORR] : Fortran only: Error status (integer).
</dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
<p>
The function C]MPI_Group_inclR] creates a group C]group_outR]
that consists of the n processes in C]groupR] with ranks C]rank[0]R], ...,
C]rank[n-1]R]; the process with rank i in C]group_outR] is the process with
rank C]ranks[i]R] in C]groupR]. Each of the n elements of ranks must be
a valid rank in C]groupR] and all elements must be distinct, or else the
program is erroneous. If C]nR] = 0, then C]group_outR] is C]MPI_GROUP_EMPTYR].
This function can, for instance, be used to reorder the elements of a C]groupR].

<h2><a name='sect8' href='#toc8'>Note</a></h2>
<p>
This implementation does not currently check to ensure that there are
no duplicates in the list of ranks.
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
<p>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. <p>
Before the error value is returned, the current MPI
error handler is called. By default, this error handler aborts the MPI job,
except for I/O function errors. The error handler may be changed with C]MPI_Comm_set_errhandlerR];
the predefined error handler C]MPI_ERRORS_RETURNR] may be used to cause
error values to be returned. Note that MPI does not guarantee that an MPI
program can continue past an error.
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<p>
C]MPI_Group_compareR](3) C]MPI_Group_range_inclR](3)
C]MPI_Group_freeR](3) <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<ul>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>C]#include <mpi.h>int MPI_Group_incl(MPI_Group group, int n, const int ranks[],    MPI_Group *newgroup)R]Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C]USE MPI! or the older form: INCLUDE [aq]mpif.h[aq]MPI_GROUP_INCL(GROUP, N, RANKS, NEWGROUP, IERROR)    INTEGER GROUP, N, RANKS(*), NEWGROUP, IERRORR]Fortran 2008 Syntax</a></li>
</ul>
<li><a name='toc5' href='#sect5'>C]USE mpi_f08MPI_Group_incl(group, n, ranks, newgroup, ierror)    TYPE(MPI_Group), INTENT(IN) :: group    INTEGER, INTENT(IN) :: n, ranks(n)    TYPE(MPI_Group), INTENT(OUT) :: newgroup    INTEGER, OPTIONAL, INTENT(OUT) :: ierrorR]Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Note</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
