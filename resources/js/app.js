import './bootstrap';
import Starback from 'starback';

const starback = new Starback('#canvas', {
    type: 'dot',
    quantity: 100,
    direction: 225,
    backgroundColor: ['#020003', '#16021f'],
    randomOpacity: true,
})
