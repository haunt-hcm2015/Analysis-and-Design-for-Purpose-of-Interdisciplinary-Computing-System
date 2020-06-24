# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MenuFood(models.Model):
    _name = 'restaurant.menu.food'
    _description = 'Menu Food Model'
    menu_type_id = fields.Many2one('menu.type')
    
class MenuType(models.Model):
    _name = 'restaurant.menu.type'
    _description = 'Menu Type Model'
