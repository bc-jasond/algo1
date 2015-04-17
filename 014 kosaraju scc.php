<?php
/**
 * Kosaraju's Strongly Connected Components using Depth-First Search
 *
 * DFS-Loop	(graph	G)
Global	variable	t	=	0
[#	of	nodes	processed	so	far]
Global	variable	s	=	NULL
[current	source	vertex]
Assume	nodes	labeled	1	to	n
For	i	=	n	down	to	1
if	i	not	yet	explored
s	:=	i
DFS(G,i)
For	ﬁnishing
 *mes	in	1st
pass
For	leaders
in	2nd	pass
DFS	(graph	G,	node	i)
--	mark	i	as	explored
--	set	leader(i)	:=	node	s
--	for	each	arc	(i,j)	in	G	:
--	if	j	not	yet	explored
--	DFS(G,j)
--	t++
--	set	f(i)	:=	t
For	rest	of
DFS-Loop
i’s	ﬁnishing
 *me
 *
 */

