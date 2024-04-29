import * as THREE from './three.js-dev/src/Three.js';
import { OrbitControls } from './three.js-dev/examples/jsm/controls/OrbitControls.js';
import { OBJLoader } from './three.js-dev/examples/jsm/loaders/OBJLoader.js';

const img3d = document.getElementById('img3d');
var width = 1000;
var height = 1000;
let a;

const scene = new THREE.Scene();
scene.background = new THREE.Color(0xdcdcdc); // Defina a cor de fundo como cinza claro

const camera = new THREE.PerspectiveCamera(75, width / height, 0.01, 10);
camera.position.z = -3;

const canvas = document.getElementById('canvas3d');
const renderer = new THREE.WebGLRenderer({ antialias: true, canvas: canvas });
renderer.setAnimationLoop(Update);
img3d.appendChild(renderer.domElement);

// Adicione luz ponto acima do objeto
const pointLight = new THREE.PointLight(0xffffff, 1);
pointLight.position.set(2, 2, 0); // Posição acima do objeto
pointLight.castShadow = true; // Habilita sombras
scene.add(pointLight);

const pointLight2 = new THREE.PointLight(0xffffff, 1);
pointLight2.position.set(-1, 2, 0); // Posição acima do objeto
pointLight2.castShadow = true; // Habilita sombras
scene.add(pointLight2);

const controls = new OrbitControls(camera, renderer.domElement);

let obj;
const objLoader = new OBJLoader();

objLoader.load(
  produtoSele,
  (object) => {
    obj = object;

    // Adiciona cor ao material
    const material = new THREE.MeshStandardMaterial({ color: 0x959595 });
    object.traverse((child) => {
      if (child instanceof THREE.Mesh) {
        child.material = material;
        child.castShadow = true;
        child.receiveShadow = true;
      }
    });

    // Ajusta a escala do objeto
    object.scale.set(0.5, 0.5, 0.5);

    // Ajusta a posição do objeto
    object.position.set(0, 0, 0);

    scene.add(object);

    // Configurar os controles de órbita
    controls.target.set(0, 0, 0);
    controls.update(); // Certifique-se de chamar isso para inicializar os controles corretamente
  },
  (xhr) => {
    a = (xhr.loaded / xhr.total) * 100;
    console.log( a + '% loaded');
    if(a == 100){
      const load3D = document.getElementById('load-3d');
      load3D.style.display = "none";
      console.log('Carregou');
    }
  },
  (error) => {
    console.error('Error loading OBJ model', error);
  }
);

// Adicione luz ambiente
const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
scene.add(ambientLight);

// Configuração de sombra
renderer.shadowMap.enabled = true;
renderer.shadowMap.type = THREE.PCFSoftShadowMap;

// ...

function Update(time) {
  controls.update();
  if (window.innerWidth == 0 || window.innerWidth > 768) {
    canvas.width = width;
    canvas.height = height;
  }
  renderer.render(scene, camera);
}
