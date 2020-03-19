# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class ClassSchool(models.Model):
    _name = 'school.class'
    _description = 'class Model'
class ClassType(models.Model):
    _name = 'school.class.type'
    _description = 'Class Type Model'