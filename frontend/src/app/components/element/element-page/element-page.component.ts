import { Component } from '@angular/core';
import { Soap } from '../../../interfaces/soap.interface';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-element-page',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './element-page.component.html'
})
export class ElementPageComponent {
  soap: Soap = {
    id: 'crystal',
    images: ['https://bonitavita.lt/images/soap_images/26A.jpg', 'https://bonitavita.lt/images/soap_images/26B.jpg', 'https://bonitavita.lt/images/soap_images/26F.jpg'],
    name: 'Crystal',
    cost: 17,
    weight: 140,
    aroma: 'Нежно сладко, голубика',
    ingredients: ['Козье молоко, Витамин Е', 'Оливковое масло', 'Облепиховое масло', 'Морская соль', 'Эко блестки', 'Золотая фольга'],
    category: ['Морская соль'],
    description: 'Это невероятно красивое мыло, сочетающее в себе нежные оттенки розового, фиолетового и голубого, создавая эффектное зрелище. Его уникальность заключается в многочисленных кристаллах, насыщенных морской солью, которые обеспечивают особое очищение кожи. Мягкие переходы цветов делают его дизайн эстетичным и привлекательным. Кристаллы мыла наполняют ванную комнату ароматом роскоши и ухода. Комбинация козьего молока, витамина Е и оливкового масла обеспечивает нежное и эффективное очищение кожи, делая ее мягкой, увлажненной и здоровой. Это мыло не только обогатит вашу кожу полезными веществами, но и создаст великолепный атмосферный опыт, погружая вас в атмосферу роскоши и уюта.',
    sale: 15,
    tag: 'New',
  }
}
