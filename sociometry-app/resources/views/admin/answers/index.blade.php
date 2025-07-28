@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f4f6f8;
    }

    .container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    h2, h4 {
        color: #2c3e50;
        font-weight: 1000px;
        margin-bottom: 1.5rem;
    }

    #network {
        height: 600px;
        border-radius: 12px;
        border: 3px solid #ddd;
        margin-bottom: 50px;
        background-color: white;
    }

    .answers-section {
        margin-top: 10px;
    }

    .answer-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        padding: 25px 30px;
        margin-bottom: 25px;
        transition: box-shadow 0.2s ease-in-out;
    }

    .answer-card:hover {
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    }

    .answer-card strong {
        font-size: 18px;
        color: #2c3e50;
    }

    .answer-card em {
        display: block;
        color: #6c757d;
        font-style: italic;
        margin: 10px 0;
    }

    .answer-card ul {
        padding-left: 22px;
        margin-top: 10px;
    }

    .answer-card li {
        margin: 20px 0;
        font-size: 15px;
    }
</style>

<div class="container">
    <h2>📊 Sosiogram Kelas</h2>

    <div id="network"></div>

    <div class="answers-section">
        <h4>📋 Rangkuman Jawaban Siswa</h4>

        @foreach ($answers as $answer)
            <div class="answer-card">
                <strong>{{ $answer->student->name }}</strong>
                <em>{{ $answer->question->text }}</em>
                <ul>
                    @foreach ($answer->selected_students as $selected)
                        <li>{{ $selected }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>

<!-- Vis.js -->
<script type="text/javascript" src="https://unpkg.com/vis-network@9.1.2/dist/vis-network.min.js"></script>
<link href="https://unpkg.com/vis-network@9.1.2/styles/vis-network.min.css" rel="stylesheet" />

<script>
document.addEventListener('DOMContentLoaded', () => {
    const allNodes = new vis.DataSet(@json($nodes));
    const allEdges = @json($edges);

    const container = document.getElementById('network');

    const visibleEdges = new vis.DataSet([]); // initially empty
    const data = {
        nodes: allNodes,
        edges: visibleEdges
    };

    const options = {
        layout: {
            improvedLayout: true
        },
        nodes: {
            shape: 'dot',
            size: 16,
            font: {
                size: 13,
                color: '#2c3e50',
                face: 'Segoe UI'
            },
            color: {
                background: '#4e73df',
                border: '#2e59d9',
                highlight: {
                    background: '#4e73df',
                    border: '#1a4acc'
                }
            }
        },
        edges: {
            arrows: {
                to: { enabled: true, scaleFactor: 0.7 }
            },
            smooth: {
                type: "dynamic"
            },
            width: 1,
            color: { color: '#bbb' }
        },
        physics: {
            enabled: true,
            stabilization: false
        },
        interaction: {
            dragNodes: true,
            dragView: true,
            zoomView: true,
            hover: true
        }
    };

    const network = new vis.Network(container, data, options);

    // Keep track of which nodes are toggled
    const toggledNodes = {};

    network.on("click", function (params) {
        if (params.nodes.length > 0) {
            const nodeId = params.nodes[0];

            if (!toggledNodes[nodeId]) {
                // Show edges from this node
                const relatedEdges = allEdges.filter(edge => edge.from === nodeId);
                visibleEdges.add(relatedEdges);
                toggledNodes[nodeId] = true;
            } else {
                // Hide edges from this node
                const relatedEdges = visibleEdges.get({
                    filter: edge => edge.from === nodeId
                });
                visibleEdges.remove(relatedEdges.map(e => e.id));
                toggledNodes[nodeId] = false;
            }
        }
    });
});
</script>

@endsection
