<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Sociogram</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
        <svg id="sociogram" width="100%" height="600"></svg>
    </div>

    <script>
        const nodes = @json($students);
        const links = @json($links);

        const svg = d3.select("#sociogram");
        const width = +svg.attr("width");
        const height = +svg.attr("height");

        const simulation = d3.forceSimulation(nodes)
            .force("link", d3.forceLink(links).id(d => d.id).distance(100))
            .force("charge", d3.forceManyBody().strength(-500))
            .force("center", d3.forceCenter(width / 2, height / 2));

        const link = svg.append("g")
            .selectAll("line")
            .data(links)
            .enter().append("line")
            .attr("stroke", "#999")
            .attr("stroke-width", 2)
            .style("visibility", "hidden");

        const node = svg.append("g")
            .selectAll("circle")
            .data(nodes)
            .enter().append("circle")
            .attr("r", 20)
            .attr("fill", "#4A90E2")
            .call(d3.drag()
                .on("start", dragstarted)
                .on("drag", dragged)
                .on("end", dragended));

        const label = svg.append("g")
            .selectAll("text")
            .data(nodes)
            .enter().append("text")
            .attr("dy", 4)
            .attr("dx", -15)
            .text(d => d.name);

        simulation.on("tick", () => {
            link
                .attr("x1", d => d.source.x)
                .attr("y1", d => d.source.y)
                .attr("x2", d => d.target.x)
                .attr("y2", d => d.target.y);

            node
                .attr("cx", d => d.x)
                .attr("cy", d => d.y);

            label
                .attr("x", d => d.x)
                .attr("y", d => d.y);
        });

        node.on("click", function(event, d) {
            const outgoing = links.filter(link => link.source.id === d.id);
            const isVisible = d3.select(link.node()).style("visibility") === "visible";

            svg.selectAll("line").style("visibility", "hidden");

            if (!isVisible) {
                outgoing.forEach(l => {
                    svg.selectAll("line")
                        .filter(d => d.source.id === l.source.id && d.target.id === l.target.id)
                        .style("visibility", "visible");
                });
            }
        });

        function dragstarted(event, d) {
            if (!event.active) simulation.alphaTarget(0.3).restart();
            d.fx = d.x;
            d.fy = d.y;
        }

        function dragged(event, d) {
            d.fx = event.x;
            d.fy = event.y;
        }

        function dragended(event, d) {
            if (!event.active) simulation.alphaTarget(0);
            d.fx = null;
            d.fy = null;
        }
    </script>

    <script src="https://d3js.org/d3.v7.min.js"></script>
</x-app-layout>
