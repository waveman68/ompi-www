<?php
$topdir = "../../..";
$title = "MPI_Cart_shift(3) man page (version 5.0.0rc2)";
$meta_desc = "Open MPI v5.0.0rc2 man page: MPI_CART_SHIFT(3)";

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
C]MPI_Cart_shiftR] - Returns the shifted source and destination ranks,
given a shift direction and amount.
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h3><a name='sect2' href='#toc2'>C Syntax</a></h3>
<br>
<pre>

</pre>
<h3><a name='sect3' href='#toc3'>C]#include &lt;mpi.h&gt;int MPI_Cart_shift(MPI_Comm comm, int direction, int disp,
   int *rank_source, int *rank_dest)R]Fortran Syntax</a></h3>
<br>
<pre>

</pre>
<h3><a name='sect4' href='#toc4'>C]USE MPI! or the older form: INCLUDE [aq]mpif.h[aq]MPI_CART_SHIFT(COMM,
DIRECTION, DISP, RANK_SOURCE,        RANK_DEST, IERROR)    INTEGER COMM,
DIRECTION, DISP, RANK_SOURCE    INTEGER RANK_DEST, IERRORR]Fortran 2008
Syntax</a></h3>
<br>
<pre>

</pre>
<h2><a name='sect5' href='#toc5'>C]USE mpi_f08MPI_Cart_shift(comm, direction, disp, rank_source, rank_dest,
ierror)    TYPE(MPI_Comm), INTENT(IN) :: comm    INTEGER, INTENT(IN) ::
direction, disp    INTEGER, INTENT(OUT) :: rank_source, rank_dest    INTEGER,
OPTIONAL, INTENT(OUT) :: ierrorR]Input Parameters</a></h2>

<dl>

<dt>[bu]</dt>
<dd>C]commR] : Communicator
with Cartesian structure (handle). </dd>

<dt>[bu]</dt>
<dd>C]directionR] : Coordinate dimension
of shift (integer). </dd>

<dt>[bu]</dt>
<dd>C]dispR] : Displacement ( &gt; 0: upward shift, &lt; 0:
downward shift) (integer). </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>[bu]</dt>
<dd>C]rank_sourceR] : Rank of
source process (integer). </dd>

<dt>[bu]</dt>
<dd>C]rank_destR] : Rank of destination process
(integer). </dd>

<dt>[bu]</dt>
<dd>C]IERRORR] : Fortran only: Error status (integer). </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
<p>
If
the process topology is a Cartesian structure, an C]MPI_SendrecvR] operation
is likely to be used along a coordinate C]directionR] to perform a shift
of data. As input, C]MPI_SendrecvR] takes the rank of a source process for
the receive, and the rank of a destination process for the send. If the
function C]MPI_Cart_shiftR] is called for a Cartesian process group, it
provides the calling process with the above identifiers, which then can
be passed to C]MPI_SendrecvR]. The user specifies the coordinate C]directionR]
and the size of the step (positive or negative). The function is local. <p>
The
C]directionR] argument indicates the dimension of the shift, i.e., the coordinate
whose value is modified by the shift. The coordinates are numbered from
0 to ndims-1, where ndims is the number of dimensions. <p>
Note: The C]directionR]
argument is in the range [0, n-1] for an n-dimensional Cartesian mesh. <p>
Depending
on the periodicity of the Cartesian group in the specified coordinate C]directionR],
C]MPI_Cart_shiftR] provides the identifiers for a circular or an end-off
shift. In the case of an end-off shift, the value C]MPI_PROC_NULLR] may be
returned in C]rank_sourceR] or C]rank_destR], indicating that the source
or the destination for the shift is out of range. <p>
Example: The C]commR]unicator,
C]commR], has a two-dimensional, periodic, Cartesian topology associated
with it. A two-dimensional array of REALs is stored one element per process,
in variable A. One wishes to skew this array, by shifting column i (vertically,
i.e., along the column) by i steps. <br>
<pre>

</pre>
<h2><a name='sect8' href='#toc8'>C]! find process rank    CALL <a href="../man3/MPI_Comm_rank.3.php">MPI_COMM_RANK</a>(comm, rank, ierr)! find Cartesian
coordinates    CALL <a href="../man3/MPI_Cart_coords.3.php">MPI_CART_COORDS</a>(comm, rank, maxdims, coords, ierr)!
compute shift source and destination    CALL MPI_CART_SHIFT(comm, 0, <i>coords(2)</i>,
source, dest, ierr)! skew array    CALL <a href="../man3/MPI_Sendrecv_replace.3.php">MPI_SENDRECV_REPLACE</a>(A, 1, MPI_REAL,
dest, 0, source, 0, comm, status,                              ierr)R]Note</a></h2>
<p>
In
Fortran, the dimension indicated by DIRECTION = i has DIMS(i+1) nodes,
where DIMS is the array that was used to create the grid. In C, the dimension
indicated by direction =
<dl>

<dt>i is the dimension </dt>
<dd>specified by dims[i]. </dd>
</dl>

<h2><a name='sect9' href='#toc9'>Errors</a></h2>
<p>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. <p>
Before the error value
is returned, the current MPI error handler is called. By default, this error
handler aborts the MPI job, except for I/O function errors. The error handler
may be changed with C]MPI_Comm_set_errhandlerR]; the predefined error handler
C]MPI_ERRORS_RETURNR] may be used to cause error values to be returned.
Note that MPI does not guarantee that an MPI program can continue past
an error. <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<ul>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>C]#include <mpi.h>int MPI_Cart_shift(MPI_Comm comm, int direction, int disp,    int *rank_source, int *rank_dest)R]Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C]USE MPI! or the older form: INCLUDE [aq]mpif.h[aq]MPI_CART_SHIFT(COMM, DIRECTION, DISP, RANK_SOURCE,        RANK_DEST, IERROR)    INTEGER COMM, DIRECTION, DISP, RANK_SOURCE    INTEGER RANK_DEST, IERRORR]Fortran 2008 Syntax</a></li>
</ul>
<li><a name='toc5' href='#sect5'>C]USE mpi_f08MPI_Cart_shift(comm, direction, disp, rank_source, rank_dest, ierror)    TYPE(MPI_Comm), INTENT(IN) :: comm    INTEGER, INTENT(IN) :: direction, disp    INTEGER, INTENT(OUT) :: rank_source, rank_dest    INTEGER, OPTIONAL, INTENT(OUT) :: ierrorR]Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>C]! find process rank    CALL <a href="../man3/MPI_Comm_rank.3.php">MPI_COMM_RANK</a>(comm, rank, ierr)! find Cartesian coordinates    CALL <a href="../man3/MPI_Cart_coords.3.php">MPI_CART_COORDS</a>(comm, rank, maxdims, coords, ierr)! compute shift source and destination    CALL MPI_CART_SHIFT(comm, 0, coords(2), source, dest, ierr)! skew array    CALL <a href="../man3/MPI_Sendrecv_replace.3.php">MPI_SENDRECV_REPLACE</a>(A, 1, MPI_REAL, dest, 0, source, 0, comm, status,                              ierr)R]Note</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
