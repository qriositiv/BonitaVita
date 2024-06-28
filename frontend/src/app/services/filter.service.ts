import { Injectable } from '@angular/core';
import { Filter } from '../interfaces/filter.interface';

@Injectable({
    providedIn: 'root',
})
export class FilterService {
    getFilter(): Filter {
        return {
            category: {
                sectionName: 'Categories',
                sectionFields: [
                    { fieldName: 'New', isFieldSelected: false, fieldAmount: 1 },
                    { fieldName: 'Popular', isFieldSelected: false, fieldAmount: 2 },
                    { fieldName: 'Sale', isFieldSelected: false, fieldAmount: 0 }
                ]
            },
            price: {
                priceTo: 30
            },
            tags: {
                sectionName: 'Tags',
                sectionFields: [
                    { fieldName: 'Eco', isFieldSelected: false, fieldAmount: 3 },
                    { fieldName: 'For children', isFieldSelected: false, fieldAmount: 6 }
                ]
            },
            sortBy: {
                methodName: 'Alphabetical'
            },
            opennedSections: [
                false, false, false, false
            ]
        };
    }
}
