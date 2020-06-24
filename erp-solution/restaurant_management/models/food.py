# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Food(models.Model):
    _name = 'restaurant.food'
    _description = 'food model'
    food_tmpl_id = fields.Many2one('product.template', string="Food")
    food_id = fields.Many2one('product.product', string="Food Variant")
    unit = fields.Char('Unit')
    food_qty = fields.Float(string="Quantity", required=True)
    image = fields.Image('Food Image')
    food_type_id = fields.Many2one(comodel_name='restaurant.food.type', string="Food Type")
    food_line_ids = fields.One2many('restaurant.food.line', 'food_line_id', 'Food Components')
class FoodType(models.Model):
    _name = 'restaurant.food.type'
    _description = 'food Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Food Type')
class FoodLine(models.Model):
    _name = "restaurant.food.line"
    _description = "Food Line Model"

    food_line_id = fields.Many2one('restaurant.food')
    food_id = fields.Many2one('product.product', string="Component")
    food_qty = fields.Float('Quantity', default=1.0, digits='Food Unit of Measure', required=True)






    

