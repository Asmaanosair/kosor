import ShowRegions from './components/admin/region/Region'
import ShowCities from './components/admin/city/City'
import ShowDistricts from './components/admin/district/District'
import ShowOrders from './components/admin/order/Order'


export default {
mode:'history',
    routes:[
        {
            path:'/Admin_CP/allRegions',
            component:ShowRegions,
            name:'ShowRegions'
        },
        {
            path:'/Admin_CP/allCities',
            component:ShowCities,
            name:'ShowCities'
        },
        {
            path:'/Admin_CP/allDistricts',
            component:ShowDistricts,
            name:'ShowDistricts'
        },
        {
            path:'/Admin_CP/allOrders',
            component:ShowOrders,
            name:'ShowOrders'
        },

    ]

}
